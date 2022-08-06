<?php

namespace App\Http\Livewire\Admin\Views\Reports;

use App\Models\User;
use Livewire\Component;

class ClientReport extends Component
{
    public $selectedClients = [];
    public function getClients()
    {
        $agents = User::query()->with(['clientJobs' => function($q){
            $q->with(['applications.user' , 'subJobs']);
        }])->withCount('applications')->where('type' , 'Client');
        if(count($this->selectedClients) > 0)
            $agents->whereIn('id' , $this->selectedClients);
        return $agents->paginate(15);
    }//End getClients


    public function render()
    {
        $clients = $this->getClients();
        return view('livewire.admin.views.reports.client-report' , [
            'clients' => $clients
        ])->extends('layouts.admin.master')->section('content');
    }
}
