<?php

namespace App\Http\Controllers\User\Employer\Jobs;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Employer\Job\CreateJobRequest;
use App\Http\Requests\User\Employer\Job\UpdateJobRequest;
use App\Models\Attachment;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Throwable;

class JobController extends Controller
{
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
        try
        {
        $job = Job::create([
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
        }catch(Throwable $e)
        {
            return redirect(route('employer.dashboard'))->with('error' , 'Attachmennts are too large');
        }
    }


    // Storing mutilple attachments with there original names
    public function addAttachementsToJob($attachments , $jobId)
    {
        foreach($attachments as $attachment)
        {
            $fileName  = $attachment->getClientOriginalName();
            $path = 'public/uploads/attachments/jobs/'.$jobId.'/';
            $attachment->storeAs($path , $fileName);
            Attachment::create([
                'name' => $fileName ,
                'job_id' => $jobId,
                'user_id' => Auth::id(),
            ]);
        }
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
