<?php

namespace App\Http\Livewire\Admin\Views\Applications\Notes;

use App\Models\Application;
use App\Models\ApplicationNote;
use App\Models\Job;
use Livewire\Component;

class ApplicationAllNotes extends Component
{
    public $applicationId , $jobTitle  , $jobSector, $jobNumber;

    public function mount($id)
    {
        $this->applicationId = $id;
        $application = Application::with('job:id,post_number')->with('job.title.sector')->findOrFail($this->applicationId);
        $this->jobNumber = $application->job->post_number;
        $this->jobTitle = $application->job->title->name;
        $this->jobSector = $application->job->title->sector->name;
    }
    public function render()
    {
        $notes = ApplicationNote::where('application_id' , $this->applicationId)
        ->with('user:id,name,type,email')
        ->orderByDesc('id')
        ->simplePaginate(15);
        return view('livewire.admin.views.applications.notes.application-all-notes' , ['notes' => $notes])
        ->extends('layouts.admin.master')->section('content');
    }
}
