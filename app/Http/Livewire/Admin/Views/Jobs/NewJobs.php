<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

use App\Models\Job;
use Livewire\Component;

class NewJobs extends Component
{
    public function render()
    {
        $jobs = Job::latest()->paginate(15);
        return view('livewire.admin.views.jobs.new-jobs' , ['jobs' => $jobs])->extends('layouts.admin.master')->section('content');
    }
}
