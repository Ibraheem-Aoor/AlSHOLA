<?php

namespace App\Http\Livewire\Coordinator\Views\Reports;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BrokerClientReport extends Component
{
    public $selectedClients = [];
    public function getClients()
    {
        $agents = User::query()->with(['clientJobs' => function($q){
            $q->where('broker_id' , Auth::id())->with(['applications.user' , 'subJobs']);
        }])->withCount('applications')->where('type' , 'Client');
        if(count($this->selectedClients) > 0)
            $agents->whereIn('id' , $this->selectedClients);
        return $agents->paginate(15);
    }//End getClients


    public function render()
    {
        $clients = $this->getClients();
        return view('livewire.coordinator.views.reports.client-report' , [
            'clients' => $clients
        ])->extends('layouts.coordinator.master')->section('content');
    }
}
