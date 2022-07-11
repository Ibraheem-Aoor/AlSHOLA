<?php

namespace App\Http\Livewire\User\Employer\Views;

use App\Models\Application;
use App\Models\Job;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $jobs = Job::with(['subJobs.title' ,'subJobs.nationality' , 'subStatus' ,'applications' , 'mainStatus'])
        ->with('subJobs.title.sector')
        ->withCount('applications')
        ->where('user_id' , Auth::id())->orderByDesc('id')->take(10)->get();

        //Client Applications
        $jobIds = Job::whereBelongsTo(Auth::user())->pluck('id');
        $applications = Application::whereIn('job_id' , $jobIds)
                        ->where('forwarded' , true);

        $acitveApplicationsCount = Application::whereIn('job_id' , $jobIds)
                        ->where('forwarded' , true)->whereHas('mainStatus' , function($mainStatus)
                        {
                            $mainStatus->where('name' , 'Active');
                        })->count();
                        
        $holdApplicationsCount = Application::whereIn('job_id' , $jobIds)
                        ->where('forwarded' , true)->whereHas('mainStatus' , function($mainStatus)
                        {
                            $mainStatus->where('name' , 'Hold');
                        })->count();

        $cancelledApplicationsCount = Application::whereIn('job_id' , $jobIds)
                        ->where('forwarded' , true)->whereHas('mainStatus' , function($mainStatus)
                        {
                            $mainStatus->where('name' , 'Cancelled');
                        })->count();

        $completedApplicationsCount = Application::whereIn('job_id' , $jobIds)
                                        ->where('forwarded' , true)->whereHas('mainStatus' , function($mainStatus)
                        {
                            $mainStatus->where('name' , 'Completed');
                        })->count();

        //Client Demands
        $underProcessJobs  = Job::where('user_id' , Auth::id())->whereHas('subStatus' , function($subStatus){
            $subStatus->where('name' , 'Demand Under Proccess');
        })->count();

        $completedJobs  = Job::where('user_id' , Auth::id())->whereHas('subStatus' , function($subStatus){
            $subStatus->where('name' , 'Demand Complete');
        })->count();

        $cancelledJobs  = Job::where('user_id' , Auth::id())->whereHas('subStatus' , function($subStatus){
            $subStatus->where('name' , 'Demand Cancelled');
        })->count();

        return view('livewire.user.employer.views.dashboard' , [
            'jobs' => $jobs,

            'acitveApplicationsCount' => $acitveApplicationsCount,
            'holdApplicationsCount' => $holdApplicationsCount,
            'cancelledApplicationsCount' => $cancelledApplicationsCount,
            'completedApplicationsCount' => $completedApplicationsCount,

            'underProcessJobs' => $underProcessJobs,
            'completedJobs' => $completedJobs,
            'cancelledJobs' => $cancelledJobs,
            ])
        ->extends('layouts.user.employer.master')->section('content');
    }
}
