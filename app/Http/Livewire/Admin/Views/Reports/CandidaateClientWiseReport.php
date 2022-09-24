<?php

namespace App\Http\Livewire\Admin\Views\Reports;

use App\Models\Application;
use App\Models\User;
use Livewire\Component;

class CandidaateClientWiseReport extends Component
{
    public $selectedClients = [];

    public function getApplications()
    {
        $applciations = Application::query()->whereHas('job')->with(['user' , 'job.user' , 'subStatus' , 'title']);
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

        return view('livewire.admin.views.reports.candidaate-client-wise-report' ,  ['applications' => $applications , 'clients' => $clients])
            ->extends('layouts.admin.master')->section('content');
    }
}
