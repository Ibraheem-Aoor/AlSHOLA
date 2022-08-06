<?php

namespace App\Http\Livewire\Admin\Views\Reports;

use App\Models\User;
use Livewire\Component;

class AgentReport extends Component
{
    public $selectedAgents = [];
    public function getAgents()
    {
        return User::with(['applications.job' => function($q){
            $q->with(['user' , 'subJobs.title:id,name']);
        }])->withCount('applications')->where('type' , 'Agent')->paginate(15);
    }
    public function render()
    {
        $agents = $this->getAgents();
        // return dd($agents);
        return view('livewire.admin.views.reports.agent-report' , [
            'agents' => $agents
        ])->extends('layouts.admin.master')->section('content');
    }
}
