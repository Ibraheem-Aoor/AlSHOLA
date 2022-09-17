<?php

namespace App\Http\Livewire\User\Employee\Views;

use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class Dashboard extends Component
{
    public function render()
    {

        $avlialbeJobs = Auth::user()->jobs()->with(['subJobs.title.sector' , 'subStatus' , 'applications' , 'user'])->take(10)->orderByDesc('created_at')->get();
        //Applications Statistics
        $acitveApplicationsCount  = Application::where('user_id' , Auth::id())->whereHas('mainStatus' , function($mainStatus)
        {
            $mainStatus->where('name' , 'Active');
        })->count();
        $holdApplicationsCount  = Application::where('user_id' , Auth::id())->whereHas('mainStatus' , function($mainStatus)
        {
            $mainStatus->where('name' , 'Hold');
        })->count();
        $cancelledApplicationsCount  = Application::where('user_id' , Auth::id())->whereHas('mainStatus' , function($mainStatus)
        {
            $mainStatus->where('name' , 'Cancelled');
        })->count();
        $completedApplicationsCount  = Application::where('user_id' , Auth::id())->whereHas('mainStatus' , function($mainStatus)
        {
            $mainStatus->where('name' , 'Completed');
        })->count();

        $underProcessJobs = Auth::user()->jobs()
                    ->with('subStatus')
                    ->whereHas('subStatus' , function($subStatus)
                    {
                        $subStatus->where('name' , 'Demand Under Proccess');
                    })
                    ->count();
        $completedJobs = Auth::user()->jobs()
                    ->with('subStatus')
                    ->whereHas('subStatus' , function($subStatus)
                    {
                        $subStatus->where('name' , 'Demand Complete');
                    })
                    ->count();
        $cancelledJobs = Auth::user()->jobs()
                    ->with('subStatus')
                    ->whereHas('subStatus' , function($subStatus)
                    {
                        $subStatus->where('name' , 'Demand Cancelled');
                    })
                    ->count();


        //Jobs Statistics

        return view('livewire.user.employee.views.dashboard' , [
            'avlialbeJobs' => $avlialbeJobs,
            'acitveApplicationsCount' => $acitveApplicationsCount,
            'holdApplicationsCount' => $holdApplicationsCount,
            'cancelledApplicationsCount' => $cancelledApplicationsCount,
            'completedApplicationsCount' => $completedApplicationsCount,

            'underProcessJobs' => $underProcessJobs,
            'completedJobs' => $completedJobs,
            'cancelledJobs' => $cancelledJobs,

        ],
        )->extends('layouts.user.employee.master')->section('content');
    }
}
