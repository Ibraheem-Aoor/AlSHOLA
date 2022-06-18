<?php

namespace App\Http\Livewire\Admin\Views\Demands;

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AllJobs extends Component
{
    public $currentRoute;
    public function mount()
    {
        $this->currentRoute = Route::currentRouteName();
    }


    public function render()
    {
        $jobs = Job::with(['subJobs.title' ,'subJobs.nationality' , 'user' , 'applications'])
        ->with('subJobs.title.sector')
        ->orderByDesc('id')->simplePaginate();
        return view('livewire.admin.views.jobs.all-jobs' , ['jobs' => $jobs])->extends('layouts.admin.master')->section('content');
    }
}
