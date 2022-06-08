<?php

namespace App\Http\Livewire\User\Employee\Views;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobDetails extends Component
{
    /*
        * This component is responsible for showing the talent the details.
    */


    public $job;
    public function mount($id)
    {
        $this->job = Job::with(['subJobs.title.sector' , 'subJobs.nationality'])->findOrFail($id);
        if(!Auth::user()->hasJob($this->job))
            abort(403);
    }

    public function render()
    {
        return view('livewire.user.employee.views.job-details')->extends('layouts.user.employee.master')->section('content');
    }
}
