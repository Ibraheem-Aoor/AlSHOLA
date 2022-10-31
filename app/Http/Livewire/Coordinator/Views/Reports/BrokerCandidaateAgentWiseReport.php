<?php

namespace App\Http\Livewire\Coordinator\Views\Reports;

use App\Models\Application;
use App\Models\subStatus;
use App\Models\User;
use Livewire\Component;

class BrokerCandidaateAgentWiseReport extends Component
{

    public $selectedAgents = [];

    public function getApplications()
    {
        $applciations = Application::query()->whereHas('job')->with(['user' , 'job.user' , 'subStatus' , 'title']);
        if($this->selectedAgents)
        {
            $applciations->whereHas('user'  , function($user)
            {
                $user->whereIn('id' , $this->selectedAgents);
            });
        }
        return $applciations->paginate(15);
    }//End getApplications
    public function render()
    {
        $applications = $this->getApplications();
        $agents = User::whereType('Agent')->get();

        return view('livewire.coordinator.views.reports.candidaate-agent-wise-report' ,  ['applications' => $applications , 'agents' => $agents])
            ->extends('layouts.coordinator.master')->section('content');
    }
}
