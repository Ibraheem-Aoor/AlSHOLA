<?php

namespace App\Http\Livewire\Admin\Views\Demands;

use App\Models\Application;
use App\Models\Job;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DemandDetails extends Component
{

    public $job  , $note;

    public function mount($id)
    {
        $this->job = Job::with(['user:id,name'  , 'applications:id,user_id,full_name,contact_no' ,
                    'nationality' , 'title.sector' , 'attachments' , 'notes'])
                    ->with(['notes.user'])
                    ->findOrFail($id);
    }


    // Return the job to the user with a note of the issue.
    public function sendjobNote()
    {
        $this->validate($this->rules());
        Note::create([
            'message' => $this->note,
            'job_id' => $this->job->id,
            'user_id' => Auth::id(),
        ]);
        notify()->success('Note Sended Successfully');
        return redirect(route('admin.demand.details' , $this->job->id));
    }

    public function rules()
    {
        return ['note'=>'required|string'];
    }
    public function render()
    {
        $applications = Application::whereJobId($this->job->id)
                    ->orderByDesc('id')
                    ->with(['user:id,name' , 'mainStatus.subStatus'])
                    ->simplePaginate(15);
        return view('livewire.admin.views.demands.demand-details'  , [
            'applications' => $applications
        ])
        ->extends('layouts.admin.master')->section('content');
    }
}
