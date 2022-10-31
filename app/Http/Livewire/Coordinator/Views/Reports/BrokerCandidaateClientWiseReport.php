<?php

namespace App\Http\Livewire\Coordinator\Views\Reports;

use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BrokerCandidaateClientWiseReport extends Component
{
    public $selectedClients = [];

    public function getApplications()
    {
        $applciations = Application::query()->whereHas('job' , function($job){
            $job->where('broker_id' , Auth::id());
        })->with(['user' , 'job.user' , 'subStatus' , 'title']);
        if($this->selectedClients)
        {
            $applciations->whereHas('job.user'  , function($user)
            {
                $user->whereIn('id' , $this->selectedClients);
            });
        }
        return $applciations->paginate(15);
    }//End getApplications
    public function render()
    {
        $applications = $this->getApplications();
        $clients = User::whereType('Client')->get();

        return view('livewire.coordinator.views.reports.candidaate-client-wise-report' ,  ['applications' => $applications , 'clients' => $clients])
            ->extends('layouts.coordinator.master')->section('content');
    }
}
