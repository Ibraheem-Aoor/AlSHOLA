<?php

namespace App\Http\Livewire\User\Employee\Views;

use App\Models\Application;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobDetails extends Component
{
    /*
        * This component is responsible for showing the talent the details.
    */


    public $job , $hasApplication;
    public function mount($id)
    {
        $this->job = Job::with(['subJobs.title.sector' , 'subJobs.nationality' , 'subStatus' , 'attachments'])->findOrFail($id);
        $this->job->attachments = $this->job->attachments()->where('type' , 'job descreption')->get();
        if(!Auth::user()->hasJob($this->job))
            abort(403);
        $this->hasApplication  = Application::where([['user_id', Auth::id()] , ['job_id' , $this->job->id]])->count();
    }

    public function render()
    {
        return view('livewire.user.employee.views.job-details')->extends('layouts.user.employee.master')->section('content');
    }
}

/**
 * Make the refused job logic in agent/admin layer.
 */
