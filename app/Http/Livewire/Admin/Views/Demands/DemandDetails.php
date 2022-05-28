<?php

namespace App\Http\Livewire\Admin\Views\Demands;

use App\Models\Application;
use App\Models\Job;
use Livewire\Component;

class DemandDetails extends Component
{

    public $job;

    public function mount($id)
    {
        $this->job = Job::with(['user:id,name'  , 'applications:id,user_id,full_name,contact_no' ,
                    'nationality' , 'title.sector'])
                    ->findOrFail($id);

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
