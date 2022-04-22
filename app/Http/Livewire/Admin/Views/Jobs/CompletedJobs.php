<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

use App\Models\Job;
use Livewire\Component;

class CompletedJobs extends Component
{
    public function render()
    {
        $jobs = Job::where('status' , 'completed')->orderBy('id')->paginate(15);
        return view('livewire.admin.views.jobs.completed-jobs' , ['jobs' => $jobs])->extends('layouts.admin.master')->section('content');
    }
}
