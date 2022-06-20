<?php

namespace App\Http\Controllers\User\Employer\Jobs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employer\Job\SetUpJobReqeust;
use App\Http\Requests\User\Employer\Job\CreateJobRequest;
use App\Http\Requests\User\Employer\Job\SetUpJobReqeust as JobSetUpJobReqeust;
use App\Http\Requests\User\Employer\Job\UpdateJobRequest;
use App\Http\Traits\User\ApplicationAttachmentTrait;
use App\Http\Traits\User\JobAttachmentTrait;
use App\Models\Application;
use App\Models\Attachment;
use App\Models\Currency;
use App\Models\FileType;
use App\Models\Job;
use App\Models\Nationality;
use App\Models\Sector;
use App\Models\SubJob;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
use Throwable;

class JobController extends Controller
{

    use JobAttachmentTrait;
    use ApplicationAttachmentTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function setupFrom(Request $request)
    {
        $oldData  = $request->session()->has('step_1') ? $request->session()->get('step_1') : null;
        $sectors = Sector::all();
        $currencies = Currency::all();
        return view('user.employer.jobs.creation-setup' , compact('sectors' , 'currencies'));

    }


    /**
     * Set up the basic demand data
     * The Incoming request have the basic demand data which will be kept in the session till the creation of the job model
     */

    public function setup(JobSetUpJobReqeust $request)
    {
        if($request->session()->has('step_1'))
        {
            $request->session()->remove('step_1');
            $files = Storage::files('public/tempUploads/'.Auth::id().'/');
            foreach($files as $file)
                Storage::delete($file);
        }
        $request->session()->put('step_1' ,  $request->except('attachments'));
        if($request->hasFile('attachments'))
            foreach($request->attachments as $asttachment)
            {
                $path = 'public/tempUploads/'.Auth::id().'/';
                $asttachment->storeAs($path , $asttachment->getClientOriginalName());
            }
        return redirect(route('job.create'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create(Request $request)
    {
        $titles = Title::all();
        $nationalities = Nationality::orderBy('name')->get()->chunk(50);
        $currencies = Currency::all();
        $sectors = Sector::all();
        return view('user.employer.jobs.create' , compact('titles' , 'nationalities' , 'currencies' , 'sectors'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJobRequest $request)
    {
        try
        {

            $job = Job::create(array_merge($request->except(['title' , 'sector' , 'salary' , 'quantity' , 'gender' , 'age_limit' , 'nationality']) ,
            [
                'post_number'=>$this->generatePosteNumber() , 'user_id' => Auth::id()
                ]
            ));
            $this->createSubJobs($request->subJob , $job->id);
            if($request->hasFile('attachments'))
                $this->uploadAttachments($request->attachments , $job->id);
            notify()->success('Job Addeed Successfully');
            return redirect(route('employer.dashboard'));
        }catch(Throwable $e)
        {
            return dd($e);
            notify()->error('soemting went wrong');
            return back();
        }
    }//end method



    function generatePosteNumber() {
        $number ='S'.mt_rand(1000, 9999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->postNumberExists($number)) {
            return $this->generatePosteNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    function postNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Job::where('post_number' , $number)->exists();
    }


    /**
     * Create All The SubJobs of the main sended Job
     */
    public function createSubJobs($subJobs , $mainJobId)
    {
        foreach($subJobs as $subjob)
        {
            SubJob::create(
                [
                    'job_id' => $mainJobId,
                    'title_id' => Title::where('name' , $subjob['title'])->first()->id,
                    'nationality_id' => Nationality::where('name' , $subjob['nationality'])->first()->id,
                    'salary' => $subjob['salary'],
                    'quantity' =>  $subjob['quantity'],
                    'age' => $subjob['age'],
                    'gender' => $subjob['gender'],
                ]
            );
        }
    }

    /**
     * Create the only sub job if there is no detection for mutliple subjob records
     */
    public function createTheOnlySubJob($subjob , $mainJobId)
    {
        SubJob::create([
            'job_id' => $mainJobId,
            'title_id' => $subjob['title'],
            'nationality_id' => $subjob['nationality'],
            'salary' => $subjob['salary'],
            'quantity' => $subjob['quantity'],
            'description' => $subjob['description'],
        ]);
    }

    public function uploadAttachments($files ,  $jobId)
    {
        $path = 'public/uploads/attachments/jobs/'.$jobId.'/';
        foreach($files as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs($path , $name);
            Attachment::create(
                [
                    'job_id' => $jobId,
                    'user_id'=> Auth::id(),
                    'name' =>  $file->getClientOriginalName(),
                    'type' => 'job descreption',
                ]
            );
        }

    }

    public function uploadJobFile($file , $jobId)
    {
        $fileName  = $file->getClientOriginalName();
        $path = 'public/uploads/attachments/jobs/'.$jobId.'/';
        $file->storeAs($path , $fileName);
        Attachment::create([
            'name' => $fileName ,
            'job_id' => $jobId,
            'user_id' => Auth::id(), //The publisher
            'type' => 'Job Specefication',
        ]);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job =Job::with(['subJobs.title' ,'subJobs.nationality' , 'user:id,name' , 'attachments'])
        ->with(['subJobs.title.sector' , 'subJobs.nationality'])
        ->findOrFail($id);
        if($job->user->id == Auth::id())
            return view('user.employer.jobs.show' , compact('job'));
        return abort(404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::with(['subJobs.title.sector' , 'subJobs.nationality'])->findorFail($id);
        $sectors = Sector::all();
        $nationalities = Nationality::orderBy('name')->get()->chunk(50);
        $currencies = Currency::all();
        return view('user.employer.jobs.edit' , compact('job' , 'sectors' , 'nationalities' , 'currencies'));
    }


    public function editStep_1(JobSetUpJobReqeust $requset , $id)
    {
        if($requset->session()->has('edit_step_1'))
        {
            $requset->session()->remove('edit_step_1');
            $files = Storage::files('public/tempUploads/'.Auth::id().'/');
            foreach($files as $file)
                Storage::delete($file);
        }
        $requset->session()->put('edit_step_1' , $requset->except('attachments'));
        if($requset->hasFile('attachments'))
            foreach($requset->attachments as $asttachment)
            {
                $path = 'public/tempUploads/'.Auth::id().'/';
                $asttachment->storeAs($path , $asttachment->getClientOriginalName());
            }
        $job = Job::with('subJobs')->findOrFail($id);
        // return dd($job);
        $nationalities = Nationality::orderBy('name')->get()->chunk(50);
        $titles = Title::whereSectorId($requset->session()->get('edit_step_1')['sector'])->get();
        return view('user.employer.jobs.edit_step_2 ' , compact('titles' , 'nationalities' , 'job'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function updateJob(UpdateJobRequest $request, $id)
    {
        return dd($request);
        $job = Job::with('subJobs')->findOrFail($id);
        // Edit the basic data from step_1
        $job->update($request->session()->get('edit_step_1'));
        //clear the job prev subJobs
        $job->subJobs->delete();
        if($request->has('subJob'))
        {
            $this->createSubJobs($request->subJob , $job->id);
        }else{
            $this->createTheOnlySubJob($request ,  $job->id);
        }
        if(count(Storage::files('public/tempUploads/'.Auth::id().'/')) > 0)
                $this->moveFilesToPrimaryFile($job->id);
        notify()->success('Job Updated Successfully');
        return redirect(route('employer.dashboard'));

    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        notify()->success('Job Deleted Successfully');
        return redirect()->back();
    }


    //ajax request
    public function setSelectedSector($id)
    {
        $sector = Sector::with('titles')->where('name' , $id)->first();
        $titles = $sector->titles;
        return $titles;
    }
}
