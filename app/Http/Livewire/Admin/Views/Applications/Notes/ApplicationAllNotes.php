<?php

namespace App\Http\Livewire\Admin\Views\Applications\Notes;

use App\Models\Application;
use App\Models\ApplicationNote;
use App\Models\Job;
use Livewire\Component;

class ApplicationAllNotes extends Component
{
    public $applicationId , $jobTitle , $jobNumber;

    public function mount($id)
    {
        $this->applicationId = $id;
        $application = Application::with('job:id,title,post_number')->findOrFail($this->applicationId);
        $this->jobNumber = $application->job->post_number;
        $this->jobTitle = $application->job->title;
    }
    public function render()
    {
        $notes = ApplicationNote::where('application_id' , $this->applicationId)->with('user:id,name,type,email')->simplePaginate(15);
        return view('livewire.admin.views.applications.notes.application-all-notes' , ['notes' => $notes])
        ->extends('layouts.admin.master')->section('content');
    }
}
