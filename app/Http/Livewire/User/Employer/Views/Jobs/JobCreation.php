<?php

namespace App\Http\Livewire\User\Employer\Views\Jobs;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Http\Livewire\User\Employer\Views\Jobs\Traits\JobRulesTrait;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class JobCreation extends Component
{
    use JobRulesTrait , WithFileUploads;

    // props
    public $title , $salary , $location ,
            $employerWebsite , $description ,
            $requirements , $responsibilities,
            $attachments;


// Validate form and create a new job.
    public function postNewJob()
    {
        $this->validate($this->rules());
        $job = Job::create(
            [
                'title' => $this->title,
                'salary' => $this->salary,
                'location' => $this->location,
                'employer_website' => $this->employerWebsite,
                'description' => $this->description,
                'responsibilities' => $this->responsibilities,
                'requirements' => $this->requirements,
                'user_id' => Auth::id(),
            ]
        );
        // $this->storeAttachments($job->id);
        notify()->success('Job is Waiting For Approval');
        return redirect(route('employer.dashboard'));
    }

    public function storeAttachments($jobId)
    {

    }

    public function render()
    {
        return view('livewire.user.employer.views.jobs.job-creation')->extends('layouts.user.employer.master')->section('content');
    }
}
