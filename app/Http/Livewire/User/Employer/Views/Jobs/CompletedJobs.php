<?php

namespace App\Http\Livewire\User\Employer\Views\Jobs;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CompletedJobs extends Component
{
    public function render()
    {
        $jobs = DB::table('jobs')->where([['user_id' , Auth::id()] , ['status' , 'completed']])->cursor();
        return view('livewire.user.employer.views.jobs.completed-jobs' , ['jobs' => $jobs])
        ->extends('layouts.user.employer.master')->section('content');;
    }
}
