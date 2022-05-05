<?php

namespace App\Http\Controllers\User\Employer\Jobs;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Employer\Job\CreateJobRequest;
use App\Http\Requests\User\Employer\Job\UpdateJobRequest;
use App\Http\Traits\User\JobAttachmentTrait;
use App\Models\Attachment;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
use Throwable;

class JobController extends Controller
{

    use JobAttachmentTrait;

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
        return view('user.employer.jobs.create');

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
            'title' => $request->input('title'),
            'salary' => $request->input('salary'),
            'location' => $request->input('location'),
            'employer_website' => $request->input('employer_website'),
            'description' => $request->input('description'),
            'responsibilities' => $request->input('responsibilities'),
            'requirements' => $request->input('requirements'),
            'vacancy' => $request->input('vacancy'),
            'nature' => $request->input('nature'),
            'end_date' => $request->input('end_date'),
            'user_id' => Auth::id(), //The Publisher
        ]);
        if($request->hasFile('attachments'))
            $this->addAttachementsToJob($request->attachments  , $job->id);
        notify()->success('Job Addeed Successfully');
        return redirect(route('employer.dashboard'));
    }//end method




    function generatePosteNumber() {
        $number = date('y').mt_rand(1000000, 9999999); // better than rand()

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::with('attachments')->findorFail($id);
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
        $job = Job::findorFail($id);
        return view('user.employer.jobs.edit' , compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update([
            'title' => $request->input('title'),
            'salary' => $request->input('salary'),
            'location' => $request->input('location'),
            'employer_website' => $request->input('employer_website'),
            'description' => $request->input('description'),
            'responsibilities' => $request->input('responsibilities'),
            'requirements' => $request->input('requirements'),
            'vacancy' => $request->input('vacancy'),
            'nature' => $request->input('nature'),
            'end_date' => $request->input('end_date'),
            'user_id' => Auth::id(),
        ]);
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
}
