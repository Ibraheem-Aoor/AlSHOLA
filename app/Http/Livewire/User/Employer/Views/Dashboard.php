<?php

namespace App\Http\Livewire\User\Employer\Views;

use App\Models\Job;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $jobs = Job::with(['subJobs.title' ,'subJobs.nationality'])
        ->with('subJobs.title.sector')
        ->where('user_id' , Auth::id())->orderByDesc('id')->take(10)->get();
        return view('livewire.user.employer.views.dashboard' , [
            'jobs' => $jobs,
            ])
        ->extends('layouts.user.employer.master')->section('content');
    }
}
