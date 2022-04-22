<?php

namespace App\Http\Controllers\User\Employer\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerJobsController extends Controller
{
    public function allJobs()
    {
        $jobs = Job::where('user_id' , Auth::id())->paginate(15);
        return view('user.employer.jobs.all-jobs' , compact('jobs'));
    }
    public function allCompletedJobs()
    {
        $jobs = Job::where([['user_id' , Auth::id()] , ['status' , 'completed']])->paginate(15);
        return view('user.employer.jobs.all-jobs' , compact('jobs'));

    }
    public function allActiveJobs()
    {
        $jobs = Job::where([['user_id' , Auth::id()] , ['status' , 'active']])->paginate(15);
        return view('user.employer.jobs.all-jobs' , compact('jobs'));

    }
    public function allPendingJobs()
    {
        $jobs = Job::where([['user_id' , Auth::id()] , ['status' , 'pending']])->paginate(15);
        return view('user.employer.jobs.all-jobs' , compact('jobs'));
    }
    public function allCanelledJobs()
    {
        $jobs = Job::where([['user_id' , Auth::id()] , ['status' , 'cancelled']])->paginate(15);
        return view('user.employer.jobs.all-jobs' , compact('jobs'));
    }
}
