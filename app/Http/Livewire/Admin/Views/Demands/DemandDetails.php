<?php

namespace App\Http\Livewire\Admin\Views\Demands;

use App\Models\Application;
use App\Models\Job;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DemandDetails extends Component
{

    public $job  , $note , $unreadNotes;

    public function mount($id)
    {
        $this->job = Job::with(['subJobs'  , 'applications.user' ,
                        'title.sector' , 'attachments' , 'notes' , 'user' , 'refuseTimes'])
                    ->with(['notes.user' , 'subJobs.title.sector'])
                    ->findOrFail($id);
        $this->unreadNotes = $this->job->notes->where('seen', false)->count();
        // $allAgents = User::where('type' , 'Agent')->with('applications')->get();
        // $t = $allAgents->applications->where('forwarder' , true)->get();

        // return dd($t);
        // return dd($this->job->subJobs->first()->title->sector->name);
    }


    // Return the job to the user with a note of the issue.
    public function sendjobNote()
    {
        $this->validate($this->rules());
        Note::create([
            'message' => $this->note,
            'job_id' => $this->job->id,
            'user_id' => Auth::id(),
            'seen' => true,
        ]);
        notify()->success('Note Sended Successfully');
        return redirect(route('admin.demand.details' , $this->job->id));
    }

    public function setReadNote($id)
    {
        $note = Note::findOrFail($id);
        $note->seen = true;
        $note->save();
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
