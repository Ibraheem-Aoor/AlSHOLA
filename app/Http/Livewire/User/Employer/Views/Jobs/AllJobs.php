<?php

namespace App\Http\Livewire\User\Employer\Views\Jobs;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use function GuzzleHttp\Promise\each;

class AllJobs extends Component
{

    public function render()
    {
        $jobs = DB::table('jobs')->where('user_id' , Auth::id())->cursor();
        return view('livewire.user.employer.views.jobs.all-jobs' , ['jobs' => $jobs]
        )->extends('layouts.user.employer.master')->section('content');
    }
}
