<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

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
        $jobs = Job::with(['user.company' , 'title.sector'])->paginate(15);
        return view('livewire.admin.views.jobs.all-jobs' , ['jobs' => $jobs])->extends('layouts.admin.master')->section('content');
    }
}
