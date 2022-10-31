<?php

namespace App\Http\Livewire\Coordinator\Views\Reports;

use App\Models\Application;
use App\Models\subStatus;
use Livewire\Component;

class BrokerCandidateStatusWiseReport extends Component
{

    public $selectedStatus = [];

    public function getApplications()
    {
        $applciations = Application::query()->whereNotNull('job_id')->with(['user' , 'job.user' , 'subStatus' , 'title']);
        if($this->selectedStatus)
        {
            $applciations->whereHas('subStatus'  , function($subStatus)
            {
                $subStatus->whereIn('id' , $this->selectedStatus);
            });
        }
        return $applciations->paginate(15);
    }
    public function render()
    {
        $applications = $this->getApplications();
        $statuses = subStatus::all();
        return view('livewire.coordinator.views.reports.candidate-status-wise-report' , ['applications' => $applications , 'statuses' => $statuses])
        ->extends('layouts.coordinator.master')->section('content');
    }
}
