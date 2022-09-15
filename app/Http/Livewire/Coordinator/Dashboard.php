<?php

namespace App\Http\Livewire\Coordinator;

use App\Http\Traits\General\BrokerTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Job;
use Illuminate\Support\Carbon;

class Dashboard extends Component
{
    use BrokerTrait;
    public $broker  , $thisMonthAchivedSales , $totalIncome , $thisMonthTotalIncome;
    public $thisMonthGoal , $comissionRate;

    public function mount()
    {
        $this->broker = User::with(['brokerJobs.invoices'  , 'nationality' , 'country' , 'brokerSalesGoal'])->findOrFail(Auth::id());
        $this->updateBrokerSalesData();
        $this->thisMonthGoal = $this->broker->brokerSalesGoal[$this->getCurrentMonth()] ?? []; //The current month sales goal required from broker
        $this->comissionRate = $this->broker->commission_rate; // commission rate for all sales on all months.
        $this->thisMonthAchivedSales = $this->getBrokerJobsByMonth($this->getCurrentMonth());
        $this->thisMonthTotalIncome = $this->getThisMonthTotalIncome();
        $this->totalIncome = $this->getTotalncome();

    }
    public function render()
    {
        $jobmcount = [];
        $jobArr = [];
            //Group Demands By Months
            $jobsByMonth = Job::select('id' , 'created_at')->get()->groupBy(function($date)
            {
                return Carbon::parse($date->created_at)->format('m');
            });

            foreach ($jobsByMonth as $key => $value) {
                $jobmcount[(int)$key] = count($value);
            }

            for($i = 1; $i <= 12; $i++){
                if(!empty($jobmcount[$i])){
                    $jobArr[$i] = $jobmcount[$i];
                }else{
                    $jobArr[$i] = 0;
                }
            }//End Group Demands By Month
        return view('livewire.coordinator.dashboard' , ['jobArr' => $jobArr])->extends('layouts.coordinator.master')->section('content');
    }
}
