<?php

namespace App\Http\Controllers\User\Employer\Jobs;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Employer\Job\CreateJobRequest;
use App\Http\Requests\User\Employer\Job\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::paginate(15);
        return view('user.employer.jobs.index' , compact('jobs'));
    }

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
        if($request->hasFile('attachments'))
            $this->addAttachementsToJob($request->file('attachments')  , $job->id);
        notify()->success('Job Addeed Successfully');
        return redirect(route('employer.dashboard'));
    }

    public function addAttachementsToJob($attachments , $jobId)
    {
        foreach($attachments as $attachment)
        {
            $fileName  = time().'.'.$attachment->getClientOriginalExtension();
            $path = 'uploads/attachments/jobs/'.$jobId.'/';
            Storage::disk('public')->putFileAs($path , $attachment  , $fileName);
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
        $job = Job::findorFail($id);
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
    public function destroy($id)
    {
        //
    }
}