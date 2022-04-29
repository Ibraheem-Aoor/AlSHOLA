<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

use App\Models\Job;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Component;

class JobDetailsEdit extends Component
{

    public $job  , $title , $salary , $vacancy , $location , $website , $status,
            $nature , $endDate , $descreption , $responsebilites , $requirements;

    public function mount($id = null)
    {
        $this->job = Job::with('user')->findOrFail($id);
        $this->title = $this->job->title;
        $this->status = $this->job->status;
        $this->salary = $this->job->salary;
        $this->vacancy = $this->job->vacancy;
        $this->location = $this->job->location;
        $this->website = $this->job->employer_website;
        $this->nature = $this->job->nature;
        $this->endDate = $this->job->end_date;
        $this->descreption = $this->job->description;
        $this->responsebilites = $this->job->responsibilities;
        $this->requirements = $this->job->requirements;
    }


    public function editJobPost()
    {
        $this->validate($this->rules());
        $this->job->title = $this->title;
        $this->job->status = $this->status;
        $this->job->salary = $this->salary;
        $this->job->vacancy = $this->vacancy;
        $this->job->location = $this->location;
        $this->job->employer_website = $this->website;
        $this->job->nature = $this->nature;
        $this->job->end_date = $this->endDate;
        $this->job->description = $this->descreption;
        $this->job->responsibilities = $this->responsebilites;
        $this->job->requirements = $this->requirements;
        $this->job->save();
        notify()->success('Job Updated Successfully');
        return redirect(route('admin.dashboard'));
    }


    public function rules()
    {
        return [
            'title' => 'required|string',
            'status' => 'required|string|'.ValidationRule::in(['completed' , 'active' , 'cancelled' , 'pending']),
            'salary' => 'required|numeric',
            'vacancy' => 'required|numeric',
            'location' => 'required|string',
            'website' => 'required|string|url',
            'nature' => 'required|string|'.ValidationRule::in(['full time' , 'part time']),
            'endDate' => 'required|string|date',
            'responsebilites' => 'required|string',
            'descreption' => 'required|string',
            'requirements' => 'required|string',
            // 'attachments.*' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx',
        ];
    }

    public function render()
    {
        return view('livewire.admin.views.jobs.job-details-edit')->extends('layouts.admin.master')->section('content');;
    }
}
