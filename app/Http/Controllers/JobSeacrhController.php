<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSeacrhController extends Controller
{
    /**
     * Searching & Filtering Jobs for all layers (Client - Agent - Admin)
     */

    public function filterJobsStatus(Request $request , $status)
    {
        $jobs = Job::withCount(['applications' , 'notes'])
        ->with(['subJobs.title.sector' , 'subStatus' , 'applications'])
        ->where('user_id' , Auth::id())
        ->whereHas('subStatus' , function($q) use($status){
                $q->where('name' , $status);
        })
        ->paginate(15);
        // return 'ggood';
        return view('user.jobs_table' , compact('jobs'));
    }//end method

    public function searchJob(Request $request)
    {
        $search = $request->search;
        $jobs = Job::whereBelongsTo(Auth::user())->withCount(['applications' , 'notes'])
            ->with(['subJobs.title.sector' , 'subStatus' , 'applications'])
            ->where('post_number' , 'like' , '%'.$search.'%')
            ->orWhere('description' , 'like' , '%'.$search.'%')
            ->orWhere('contract_period' , 'like' , '%'.$search.'%')
            ->orWhere('working_hours' , 'like' , '%'.$search.'%')
            ->orWhere('working_days' , 'like' , '%'.$search.'%')
            ->orWhere('accommodation' , 'like' , '%'.$search.'%')
            ->orWhere('transport' , 'like' , '%'.$search.'%')
            ->orWhere('medical' , 'like' , '%'.$search.'%')
            ->orWhere('insurance' , 'like' , '%'.$search.'%')
            ->orWhere('food' , 'like' , '%'.$search.'%')
            ->orWhere('food_amount' , 'like' , '%'.$search.'%')
            ->orWhere('annual_leave' , 'like' , '%'.$search.'%')
            ->orWhere('joining_ticket' , 'like' , '%'.$search.'%')
            ->orWhere('return_ticket' , 'like' , '%'.$search.'%')
            ->orWhere('covid_test' , 'like' , '%'.$search.'%')
            ->orWhere('age' , 'like' , '%'.$search.'%')
            ->orWhere('requested_by' , 'like' , '%'.$search.'%')
            ->orWhere('sex' , 'like' , '%'.$search.'%')
            ->orWhere('currency' , 'like' , '%'.$search.'%')
            ->orWhere('gender_prefrences' , 'like' , '%'.$search.'%')
            ->orWhere('age_limit' , 'like' , '%'.$search.'%')
            ->orWhere('accommodation_amount' , 'like' , '%'.$search.'%')
            ->orWhere('other_terms' , 'like' , '%'.$search.'%')
            ->orWhere('created_at' , 'like' , '%'.$search.'%')
            ->orWhereHas('subJobs' , function($q) use($search)
            {
                $q->whereHas('title' , function($title) use($search){
                    $title->where('name' ,  'like' , '%'.$search.'%');
                })
                ->orWhereHas('nationality' , function($nationality) use($search){
                    $nationality->where('name' ,  'like' , '%'.$search.'%');
                })
                ->orWhere('salary'   , 'like' , '%'.$search.'%')
                ->orWhere('age'   , 'like' , '%'.$search.'%')
                ->orWhere('gender'   , 'like' , '%'.$search.'%');
            })->simplePaginate(15);
        return view('user.employer.jobs.all-jobs' , compact('jobs'));
    }//end method



    /**
     * Agent Jobs Filtering
     */
    public function filterAgentJobs(Request $request , $status)
    {
        $avlialbeJobs =  Auth::user()->jobs()
            ->with(['subJobs.title.sector' , 'user:id,name' , 'subStatus' , 'applications'])
            ->whereHas('subStatus' , function($q) use($status){
                $q->where('name' , $status);
            })
            ->paginate(15);
        return view('user.avilable-jobs_table' , compact('avlialbeJobs'));
    }//end method.


    public function searchAgentJobs(Request $request)
    {
        $search = $request->search;
        $avlialbeJobs =  Auth::user()->jobs()
        ->with(['subJobs.title.sector' , 'user:id,name' , 'subStatus' , 'applications'])
        ->where('post_number' , 'like' , '%'.$search.'%')
            ->orWhere('description' , 'like' , '%'.$search.'%')
            ->orWhere('contract_period' , 'like' , '%'.$search.'%')
            ->orWhere('working_hours' , 'like' , '%'.$search.'%')
            ->orWhere('working_days' , 'like' , '%'.$search.'%')
            ->orWhere('accommodation' , 'like' , '%'.$search.'%')
            ->orWhere('transport' , 'like' , '%'.$search.'%')
            ->orWhere('medical' , 'like' , '%'.$search.'%')
            ->orWhere('insurance' , 'like' , '%'.$search.'%')
            ->orWhere('food' , 'like' , '%'.$search.'%')
            ->orWhere('food_amount' , 'like' , '%'.$search.'%')
            ->orWhere('annual_leave' , 'like' , '%'.$search.'%')
            ->orWhere('joining_ticket' , 'like' , '%'.$search.'%')
            ->orWhere('return_ticket' , 'like' , '%'.$search.'%')
            ->orWhere('covid_test' , 'like' , '%'.$search.'%')
            ->orWhere('age' , 'like' , '%'.$search.'%')
            ->orWhere('requested_by' , 'like' , '%'.$search.'%')
            ->orWhere('sex' , 'like' , '%'.$search.'%')
            ->orWhere('currency' , 'like' , '%'.$search.'%')
            ->orWhere('gender_prefrences' , 'like' , '%'.$search.'%')
            ->orWhere('age_limit' , 'like' , '%'.$search.'%')
            ->orWhere('accommodation_amount' , 'like' , '%'.$search.'%')
            ->orWhere('other_terms' , 'like' , '%'.$search.'%')
            ->orWhereHas('subJobs' , function($q) use($search)
            {
                $q->whereHas('title' , function($title) use($search){
                    $title->where('name' ,  'like' , '%'.$search.'%');
                })
                ->orWhereHas('nationality' , function($nationality) use($search){
                    $nationality->where('name' ,  'like' , '%'.$search.'%');
                })
                ->orWhere('salary'   , 'like' , '%'.$search.'%')
                ->orWhere('age'   , 'like' , '%'.$search.'%')
                ->orWhere('gender'   , 'like' , '%'.$search.'%');
            })->simplePaginate(15);
            return view('user.employee.avilable-jobs' , compact('avlialbeJobs'));
        }
}
