<?php

namespace App\Http\Livewire\User\Employer\Views;

use App\Models\Job;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $jobs = Job::with('notes')->orderByDesc('id')->get();
        $activeJobs = $jobs->where('status' , 'active')->take(10);
        // $returnedJobs = Job::whereHas('notes')->take(5);
        // return dd($returnedJobs);
        return view('livewire.user.employer.views.dashboard' , [ 'activeJobs' => $activeJobs])
        ->extends('layouts.user.employer.master')->section('content');
    }
}
