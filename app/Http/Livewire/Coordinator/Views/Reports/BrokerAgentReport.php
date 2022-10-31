<?php

namespace App\Http\Livewire\Coordinator\Views\Reports;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BrokerAgentReport extends Component
{
    public $selectedAgents = [];
    public function getAgents()
    {
        $agents = User::query()->with(['applications.job' => function($q){
            $q->whereBrokerId(Auth::id())->with(['user' , 'subJobs']);
        }])->withCount('applications')->where('type' , 'Agent');
        if(count($this->selectedAgents) > 0)
            $agents->whereIn('id' , $this->selectedAgents);
        return $agents->paginate(15);
    }//End getAgents


    public function render()
    {
        $agents = $this->getAgents();
        // dd($agents);
        // return dd($agents);
        return view('livewire.coordinator.views.reports.agent-report' , [
            'agents' => $agents
        ])->extends('layouts.coordinator.master')->section('content');
    }
}
