<?php

namespace App\Http\Controllers\User\Employer\Jobs;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerJobsController extends Controller
{
    /*
        This class is respnsilbe for showing the emplyoer different type jobs.
    */

    /**
     * Make Filters Here
     */
    public function allJobs()
    {
        $jobs = Job::where('user_id' , Auth::id())
        ->withCount(['applications' , 'notes'])
        ->with(['subJobs.title.sector' , 'subStatus' , 'applications'] )
                    ->simplePaginate(15);
        return view('user.employer.jobs.all-jobs' , compact('jobs'));
    }
}//End Class
