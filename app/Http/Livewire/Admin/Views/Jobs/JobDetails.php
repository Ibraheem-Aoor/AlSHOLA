<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

use App\Http\Livewire\Admin\Views\GeneralModal;
use App\Models\Job;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JobDetails extends Component
{
    public $job , $note , $currentNoteContent = null;
    public function mount($id = null)
    {
        $this->job = Job::with(['user' , 'notes' , 'attachments' ,
                                'applications.user' , 'title.sector' ,
                                'nationality'])->findOrFail($id);
    }


    //Open the clicked attachment
    public function openAttachment($name)
    {
        return redirect(route('file.open',[ 'jobId' => $this->job->id ,  'fileName' => $name]));
    }

    //Download the clicked attachment
    public function downloadAttachment($name)
    {
        return redirect(route('file.download',[ 'jobId' => $this->job->id ,  'fileName' => $name]));
    }

    public function deleteAttachment($name)
    {
        return redirect(route('file.delete',[ 'jobId' => $this->job->id ,  'fileName' => $name]));
    }


    //download application file
    public function downloadCv($name)
    {
        return redirect(route('cv.download',[ 'jobId' => $this->job->id ,  'fileName' => $name]));
    }




    // Return the job to the user with a note of the issue.
    public function returnJobWithNote()
    {
        $this->validate($this->rules());
        Note::create([
            'message' => $this->note,
            'job_id' => $this->job->id,
            'user_id' => Auth::id(),
        ]);
        notify()->success('Job Has been returned Successfully');
        return redirect(route('admin.job.details' , $this->job->id));
    }

    public function rules()
    {
        return ['note'=>'required|string'];
    }


    //Get the current note content to show it on modal.
    public function render()
    {
        return view('livewire.admin.views.jobs.job-details' , ['currentNoteContent' => $this->currentNoteContent])->extends('layouts.admin.master')->section('content');
    }
}
