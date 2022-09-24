<?php

namespace App\Http\Livewire\Coordinator\Views;

use App\Models\Application;
use App\Models\Job;
use Livewire\Component;

class BrokerDemandDetails extends Component
{

    public $job  , $note , $unreadNotes;

    public function mount($id)
    {
        $this->job = Job::with(['subJobs'  , 'applications.user' ,
                        'title.sector' , 'attachments' , 'notes' , 'user' , 'refuseTimes'])
                    ->with(['notes.user' , 'subJobs.title.sector' , 'subStatus'])
                    ->findOrFail($id);
        $this->unreadNotes = $this->job->notes->where('seen', false)->count();
    }


    public function render()
    {
        $data['applications'] = Application::whereJobId($this->job->id)
                    ->orderByDesc('id')
                    ->with(['user:id,name' , 'mainStatus.subStatus'])
                    ->simplePaginate(10);
        return view('livewire.coordinator.views.broker-demand-details' , $data)->extends('layouts.coordinator.master')->section('content');
    }
}
