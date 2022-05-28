<?php

namespace App\Http\Controllers\User\Employer\Jobs;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Employer\Job\CreateJobRequest;
use App\Http\Requests\User\Employer\Job\UpdateJobRequest;
use App\Http\Traits\User\ApplicationAttachmentTrait;
use App\Http\Traits\User\JobAttachmentTrait;
use App\Models\Application;
use App\Models\Attachment;
use App\Models\FileType;
use App\Models\Job;
use App\Models\Nationality;
use App\Models\Sector;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $fileTypes = FileType::all();
        $sectors = Sector::all();
        $nationalities = Nationality::orderBy('name')->get()->chunk(50);
        return view('user.employer.jobs.create' , compact('fileTypes' , 'sectors' , 'nationalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateJobRequest $request)
    {
        $job = Job::create([
            'post_number' => $this->generatePosteNumber(),
            'title_id' => $request->input('title'),
            'natoinality_id' => $request->input('nationality'),
            'salary' => $request->input('salary'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description'),
            'other_terms' => $request->input('other_terms') ?? null,
            // 'covid_test' => $request->input('covid_test'),
            // 'indemnity_leave_and_overtime_salary' => $request->input('indemnity_leave_and_overtime_salary'),
            // 'air_ticket' => $request->input('air_ticket'),
            // 'annual_leave' => $request->input('annual_leave'),
            'food' => $request->input('food'),
            // 'insurance' => $request->input('insurance'),
            // 'medical' => $request->input('medical'),
            'transport' => $request->input('transport'),
            'accommodation_amount' => $request->accommodation_amount,
            'food_amount' => $request->input('food_amount'),
            'off_day' => $request->input('off_day'),
            'working_days' => $request->input('working_days'),
            'joining_ticked' => $request->input('joining_ticked'),
            'return_ticket' => $request->input('return_ticket'),
            // 'working_hours' => $request->input('working_hours'),
            // 'contract_period' => $request->input('contract_period'),
            'user_id' => Auth::id(), //The Publisher
        ]);
        if($request->hasFile('attachments'))
            $this->addAttachementsToJob($request->attachments  , $job->id , $request->file_type);
        if($request->hasFile('responsibilites_file'))
            $this->uploadJobFile($request->responsibilites_file  , $job->id);
        notify()->success('Job Addeed Successfully');
        return redirect(route('employer.dashboard'));
    }//end method



    function generatePosteNumber() {
        $number = date('y').mt_rand(10000000, 99999999); // better than rand()

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
        $job = Job::with(['title.sector' , 'nationality'])->findorFail($id);
        return view('user.employer.jobs.show' , compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::with(['title.sector' , 'nationality'])->findorFail($id);
        $fileTypes = FileType::all();
        $sectors = Sector::all();
        $nationalities = Nationality::orderBy('name')->get()->chunk(50);
        return view('user.employer.jobs.edit' , compact('job' , 'sectors' , 'nationalities' , 'fileTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /*
    public function update(UpdateJobRequest $request, $id)
    {
        $job = Job::findOrFail($id);
        // if($request->input('responsibilities') == null && $request->input('file_type') == null)
        // {
        //     notify()->error('Job Responsibilities Required');
        //     return redirect()->withErrors('error' , 'Job Responsibilities Required');
        // }
        $job->update([
            'post_number' => $this->generatePosteNumber(),
            'title_id' => $request->input('title'),
            'natoinality_id' => $request->input('nationality'),
            'salary' => $request->input('salary'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description'),
            'other_terms' => $request->input('other_terms') ?? null,
            'covid_test' => $request->input('covid_test'),
            'indemnity_leave_and_overtime_salary' => $request->input('indemnity_leave_and_overtime_salary'),
            'air_ticket' => $request->input('air_ticket'),
            'annual_leave' => $request->input('annual_leave'),
            'food' => $request->input('food'),
            'insurance' => $request->input('insurance'),
            'medical' => $request->input('medical'),
            'transport' => $request->input('transport'),
            'accommodation' => $request->input('accommodation'),
            'off_day' => $request->input('off_day'),
            'working_days' => $request->input('working_days'),
            // 'working_hours' => $request->input('working_hours'),
            'contract_period' => $request->input('contract_period'),
            'user_id' => Auth::id(), //The Publisher
        ]);
        if($request->hasFile('attachments'))
            $this->addAttachementsToJob($request->attachments  , $id , $request->file_type);
        if($request->hasFile('responsibilites_file'))
            $this->uploadJobFile($request->responsibilites_file  , $id);
        notify()->success('Job Updated Successfully');
        return redirect(route('employer.dashboard'));

    }

 */



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
        $sector = Sector::with('titles')->findOrFail($id);
        $titles = $sector->titles;
        return $titles;
    }
}
