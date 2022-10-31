<?php

namespace App\Http\Livewire\Coordinator\Views\Reports;

use App\Models\Application;
use App\Models\subStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BrokerCandidateStatusWiseReport extends Component
{

    public $selectedStatus = [];

    public function getApplications()
    {
        $applciations = Application::query()->whereNotNull('job_id')->with(['user' , 'subStatus' , 'title'
        , 'job' => function($q){
            $q->where('broker_id' , Auth::id())->with('user');
        }]);
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
