<?php

namespace App\Http\Livewire\Admin\Views\Demands;

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AllJobs extends Component
{
    public $currentRoute , $targetJob;
    public function mount()
    {
        $this->currentRoute = Route::currentRouteName();
    }

    public function setTragetJob($id)
    {
        $this->targetJob = Job::with(['applications.user' , 'subStatus' , 'mainStatus' , ])->withCount('applications')->findOrFail($id);
    }

    public function render()
    {
        $jobs = Job::with(['subJobs.title' ,'subJobs.nationality' , 'user' , 'applications.user' , 'subStatus'])
        ->with('subJobs.title.sector')
        ->orderByDesc('id')->simplePaginate();
        return view('livewire.admin.views.jobs.all-jobs' , ['jobs' => $jobs])->extends('layouts.admin.master')->section('content');
    }
}
