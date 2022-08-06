<?php

namespace App\Http\Livewire\Admin\Views\Broker;

use App\Models\Job;
use App\Models\User;
use Livewire\Component;

class AssignDemandToBroker extends Component
{

    public $job;

    public function mount($id)
    {
        $this->job = Job::findOrFail($id);
    }

    public function getBorkers()
    {
        return User::whereType('Broker')->paginate(15);
    }//End getBrokers

    public function selectBroker($brokerId)
    {
        $this->job->broker_id = $brokerId;
        notify()->success('Broker Selected Successfully');
        $this->job->save();
        // return redirect(route('brokers.assign' , $this->job->id));
    }//End selectBroker

    public function removeBroker($brokerId)
    {
        $this->job->broker_id = null;
        notify()->success('Broker deselected Successfully');
        $this->job->save();
        // return redirect(route('brokers.assign' , $this->job->id));
    }//End removeBroker

    public function render()
    {
        $brokers = $this->getBorkers();
        return view('livewire.admin.views.broker.assign-demand-to-broker' ,
                ['brokers' => $brokers])
        ->extends('layouts.admin.master')->section('content');
    }
}
