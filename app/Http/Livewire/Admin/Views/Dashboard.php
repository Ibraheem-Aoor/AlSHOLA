<?php

namespace App\Http\Livewire\Admin\Views;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Dashboard extends Component
{

    public function mount()
    {
        if(!Cache::has('adminData'))
            {
                    $demands = Job::all();
                    $users = User::all();
                    $applicatios = Application::with('subStatus')->get();
                    Cache::rememberForever('adminData', function() use ($applicatios , $users , $demands){
                        return [
                            //cards statistics
                            'totalDemands' => Job::count(),
                            'totalCandidates' => $applicatios->where(['subStatus.name'  , '!=' , 'cancelled'])->count(),
                            'totalApplicationsWFvisa' => $applicatios->where('subStatus.name'  ,  'waiting for visa')->count(),
                            'totalApplicationsWFMedical' => $applicatios->where('subStatus.name'  , 'waiting for medical')->count(),
                            'totalApplicationsWFSelection' => $applicatios->where('subStatus.name'  ,  'For Selection')->count(),
                            'totalApplicationsWFArrival' => $applicatios->where('subStatus.name'  ,  'For Arrival Scheduled')->count(),
                            'totalApplicationsWFInterview' => $applicatios->where('subStatus.name'   , 'waiting for interview')->count(),
                            'totalClients' => $users->where('type' , 'Client')->count(),

                            //charts Statistics
                            'totalUnderProccess' => $demands->where('Demand Under Process')->count(),
                            // 'totalArrived' => Job::with('applications.subStatus' , 'applications')->where('applications' , function($q)
                            // {
                            //         $q->where('subStatus.name' , 'Arrived');
                            // // })->count(),
                            // 'totalToBeSupply' => Job::where('status' , 'pending')->count(),
                            'allDemands' => $demands,


                        ];
                    }//end callback
                );


            }
            // return dd(Cache::get('adminData'));
    }
    public function render()
    {
        return view('livewire.admin.views.dashboard')->extends('layouts.admin.master')->section('content');
    }
}
