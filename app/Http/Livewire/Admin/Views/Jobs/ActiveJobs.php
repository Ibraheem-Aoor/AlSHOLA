<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

use App\Models\Job;
use Livewire\Component;

class ActiveJobs extends Component
{
    public function render()
    {
        $jobs = Job::where('status' , 'active')->orderBy('id')->paginate(15);
        return view('livewire.admin.views.jobs.active-jobs' ,['jobs' => $jobs],
        )->extends('layouts.admin.master')->section('content');
    }
}
