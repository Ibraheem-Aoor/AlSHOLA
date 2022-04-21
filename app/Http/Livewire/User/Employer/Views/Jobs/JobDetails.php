<?php

namespace App\Http\Livewire\User\Employer\Views\Jobs;

use App\Http\Livewire\User\Employer\Views\Jobs\Traits\JobRulesTrait;
use App\Models\Job;
use Livewire\Component;

class JobDetails extends Component
{
    use JobRulesTrait;
    //props


    public $job , $title , $salary , $location ,
    $employerWebsite , $description ,
    $requirements , $responsibilities;


    public function mount($id = null)
    {
        $this->job = Job::findOrFail($id);
        $this->setAttributes();
    }

    public function setAttributes()
    {
        $this->title = $this->job->title;
        $this->salary = $this->job->salary;
        $this->location = $this->job->location;
        $this->employerWebsite = $this->job->employer_website;
        $this->description = $this->job->description;
        $this->requirements = $this->job->requirements;
        $this->responsibilities = $this->job->responsibilities;
    }
    public function saveJobcp()
    {
        $this->validate($this->rules());
        $this->job->update([
            'title' => $this->title,
            'salary' => $this->salary,
            'location' => $this->location,
            'employer_website' => $this->employerWebsite,
            'description' => $this->description,
            'responsibilities' => $this->responsibilities,
            'requirements' => $this->requirements,
        ]);
        notify()->success('Job Updated Successfully');
        return redirect(route('employer.dashboard'));
    }

    public function deleteJob()
    {
        $this->job->delete();
        notify()->success('Job Deleted Successfully');
        return redirect(route('employer.dashboard'));
    }

    public function render()
    {
        return view('livewire.user.employer.views.jobs.job-details')->extends('layouts.user.employer.master')->section('content');;
    }
}
