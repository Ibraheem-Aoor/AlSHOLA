<?php

namespace App\Http\Livewire\Admin\Views\Broker;

use App\Http\Traits\General\BrokerTrait;
use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Livewire\Component;

class BrokerDetails extends Component
{
    use BrokerTrait;
    public $broker  , $thisMonthAchivedSales , $totalIncome , $thisMonthTotalIncome;
    public $thisMonthGoal , $comissionRate;
    public function mount($id)
    {
        $this->broker = User::whereType('Broker')->with(['brokerJobs.invoices'  , 'nationality' , 'country' , 'brokerSalesGoal'])->findOrFail($id);
        $this->updateBrokerSalesData();
        $this->thisMonthGoal = $this->broker?->brokerSalesGoal[$this->getCurrentMonth()] ?? 0; //The current month sales goal required from broker
        $this->comissionRate = $this->broker->commission_rate; // commission rate for all sales on all months.
        $this->thisMonthAchivedSales = $this->getBrokerJobsByMonth($this->getCurrentMonth());
        $this->thisMonthTotalIncome = $this->getThisMonthTotalIncome();
        $this->totalIncome = $this->getTotalncome();

    }



    public function render()
    {
        $jobArr = $this->getBrokerJobsByMonth();
        return view('livewire.admin.views.broker.broker-details' , [
            'jobArr' => $jobArr
        ])->extends('layouts.admin.master')->section('content');
    }}
