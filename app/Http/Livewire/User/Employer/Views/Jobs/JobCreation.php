<?php

namespace App\Http\Livewire\User\Employer\Views\Jobs;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobCreation extends Component
{
    // props
    public $title , $salary , $location ,
            $employerWebsite , $description ,
            $requirements , $responsibilities;


// Validate form and create a new job.
    public function postNewJob()
    {
        $this->validate($this->rules());
        Job::create(
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
        notify()->success('Job is Waiting For Approval');
        return redirect(route('employer.dashboard'));
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'salary' => 'required|numeric',
            'location' => 'required|string',
            'employerWebsite' => 'required|string',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
        ];
    }
    public function render()
    {
        return view('livewire.user.employer.views.jobs.job-creation')->extends('layouts.user.employer.master')->section('content');
    }
}
