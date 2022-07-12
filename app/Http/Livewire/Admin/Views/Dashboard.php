<?php

namespace App\Http\Livewire\Admin\Views;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Dashboard extends Component
{

    public function mount()
    {
        if(!Cache::has('adminData'))
            {
                    $demands = Job::with('subStatus')->get();
                    $users = User::all();

                    $applicatios = Application::with('subStatus');

                    Cache::rememberForever('adminData', function() use ($applicatios , $users , $demands){
                        return [
                            //cards statistics
                            'totalDemands' => Job::count(),
                            'totalCandidates' => $applicatios->whereHas('subStatus'  , function($subStatus){
                                $subStatus->where('name' , '!=' , 'Cancelled Application');
                            })->count(),
                            'totalApplicationsWFvisa' => $applicatios->whereHas('subStatus'  , function($subStatus){
                                $subStatus->where('name' , 'waiting for visa');
                            })->count(),
                            'totalApplicationsWFMedical' => $applicatios->whereHas('subStatus'  , function($subStatus){
                                $subStatus->where('name' , 'waiting for medical');
                            })->count(),
                            'totalApplicationsWFSelection' => $applicatios->whereHas('subStatus'  , function($subStatus){
                                $subStatus->where('name' , 'For Selection');
                            })->count(),
                            'totalApplicationsWFArrival' => $applicatios->whereHas('subStatus' , function($subStatus){
                                $subStatus->where('name' ,  'To Be Arrived');
                            })->count(),
                            'totalApplicationsWFInterview' => $applicatios->whereHas('subStatus' , function($subStatus){
                                $subStatus->where('name' ,  'waiting for interview');
                            })->count(),
                            'totalClients' => $users->where('type' , 'Client')->count(),

                            //charts Statistics
                            'totalUnderProccess' => $demands->where('subStatus.name'  , 'Demand Under Process')->count(),
                            // 'totalArrived' => Job::with('applications.subStatus' , 'applications')->where('applications' , function($q)
                            // {
                            //         $q->where('subStatus.name' , 'Arrived');
                            // // })->count(),
                            // 'totalToBeSupply' => Job::where('status' , 'pending')->count(),
                            'allDemands' => $demands,
                            'latestJobs' =>Job::latest()->with(['subStatus' , 'user:id,name'])->take(5)->orderByDesc('created_at')->get(),
                            'latestApplications' => Application::latest()->with(['subStatus' , 'user:id,name'])->take(5)->orderByDesc('created_at')->get(),

                            'jobsCount' => Job::count(),
                            'applicationsCount' => Application::count(),

                        ];
                        }//end callback
                );
            }

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
        return view('livewire.admin.views.dashboard' , ['jobArr' => $jobArr])->extends('layouts.admin.master')->section('content');
    }
}
