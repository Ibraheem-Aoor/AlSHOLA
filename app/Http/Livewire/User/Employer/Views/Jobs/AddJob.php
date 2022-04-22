<?php

namespace App\Http\Livewire\User\Employer\Views\Jobs;

use Livewire\Component;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\User\Employer\Views\Jobs\Traits\JobRulesTrait;
use Illuminate\Support\Facades\Storage;



class AddJob extends Component
{
    // props
    public $title ="test", $salary , $location ,
            $employerWebsite , $description ,
            $requirements , $responsibilities;




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

                notify()->success('Job is Waiting For Approval');
                return redirect(route('employer.dashboard'));
        }


        public function goTest()
        {
            return dd('asd');
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
                // 'attachments.*' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx',
            ];
        }
    public function render()
    {
        return view('livewire.user.employer.views.jobs.add-job')
        ->extends('layouts.user.employer.master')->section('content');
    }
}
