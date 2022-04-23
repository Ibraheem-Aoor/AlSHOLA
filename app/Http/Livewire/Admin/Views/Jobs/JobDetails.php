<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

use App\Models\Job;
use Livewire\Component;

class JobDetails extends Component
{
    public $job;
    public function mount($id = null)
    {
        $this->job = Job::with('user')->findOrFail($id);
    }

    public function openAttachment($name)
    {
        return redirect(route('file.open',[ 'jobId' => $this->job->id ,  'fileName' => $name]));
    }

    public function downloadAttachment($name)
    {
        return redirect(route('file.download',[ 'jobId' => $this->job->id ,  'fileName' => $name]));

    }
    public function render()
    {
        return view('livewire.admin.views.jobs.job-details')->extends('layouts.admin.master')->section('content');
    }
}
