<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

use App\Models\Job;
use Livewire\Component;

class NewJobs extends Component
{
    public function render()
    {
        $jobs = Job::latest()->with(['nationality' , 'user' , 'title.sector'])->paginate(15);
        return view('livewire.admin.views.jobs.all-jobs' ,['jobs' => $jobs],
        )->extends('layouts.admin.master')->section('content');
    }
}
