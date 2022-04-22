<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

use App\Models\Job;
use Livewire\Component;

class AllJobs extends Component
{
    public function render()
    {
        $jobs = Job::with('user')->select('name')->paginate(15);
        return view('livewire.admin.views.jobs.all-jobs' , ['jobs' => $jobs])->extends('layouts.admin.master')->section('content');
    }
}
