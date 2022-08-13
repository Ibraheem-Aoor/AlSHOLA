<?php

namespace App\Http\Livewire\Coordinator;

use Livewire\Component;

class AllDemands extends Component
{

    public $broker;
    public function getDemands()
    {
        $this->broker = $user = $this->getAuthUser();
        return $user->brokerJobs()->paginate(15);
    }//End getDemands()
    public function render()
    {
        $data['jobs'] = $this->getDemands();
        return view('livewire.coordinator.all-demands' , $data)->extends('layouts.coordinator.master')->section('content');
    }
}
