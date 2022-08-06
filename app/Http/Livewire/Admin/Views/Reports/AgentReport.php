<?php

namespace App\Http\Livewire\Admin\Views\Reports;

use App\Models\User;
use Livewire\Component;

class AgentReport extends Component
{
    public $selectedAgents = [];
    public function getAgents()
    {
        $agents = User::query()->with(['applications.job' => function($q){
            $q->with(['user' , 'subJobs']);
        }])->withCount('applications')->where('type' , 'Agent');
        if(count($this->selectedAgents) > 0)
            $agents->whereIn('id' , $this->selectedAgents);
        return $agents->paginate(15);
    }//End getAgents


    public function render()
    {
        $agents = $this->getAgents();

        // return dd($agents);
        return view('livewire.admin.views.reports.agent-report' , [
            'agents' => $agents
        ])->extends('layouts.admin.master')->section('content');
    }
}
