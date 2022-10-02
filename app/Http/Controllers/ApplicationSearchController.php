<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\subStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationSearchController extends Controller
{
    /**
     * Searching & Filtering Application for all layers (Client - Agent - Admin)
     */



    public function filterApplicationsStatus(Request $request , $status)
    {
    
        $jobIds = Job::whereBelongsTo(Auth::user())->pluck('id');
        $applications = Application::whereIn('job_id' , $jobIds)
                        ->where('forwarded', true)
                        ->with(['job:id,post_number' , 'title' ,'user:id,name,type' , 'Job' , 'mainStatus' , 'subStatus'])->with(['job.subJobs.title.sector' , 'job.subStatus'])->withCount('attachments')
                        ->whereHas('mainStatus' , function($q) use($status)
                        {
                            $q->where('name' , $status);
                        })
                        ->simplePaginate(15);
        return view('user.applications_table' , compact('applications'));
    }//end method



    public function filterApplicationsSubStatus(Request $request , $status)
    {
        $user = $this->getAuthUser();
        $jobIds = Job::whereBelongsTo($user)->pluck('id');
        $applications = Application::whereIn('job_id' , $jobIds)
                        ->where('forwarded', true)
                        ->with(['job:id,post_number' , 'title' ,'user:id,name,type' , 'Job' , 'mainStatus' , 'subStatus'])->with(['job.subJobs.title.sector' , 'job.subStatus'])->withCount('attachments')
                        ->whereHas('subStatus' , function($q) use($status)
                        {
                            $q->where('id' , $status);
                        })
                        ->simplePaginate(15);
        return view('user.applications_table' , compact('applications'));
    }//end method







    public function searchApplication(Request $request)
    {
        $search = $request->search;
        $jobIds = Job::whereBelongsTo(Auth::user())->pluck('id');
        $data['applications'] = Application::whereIn('job_id' , $jobIds)
            ->with(['job:id,post_number' , 'title' ,'user:id,name,type' , 'Job' , 'mainStatus' , 'subStatus'])
            ->with(['job.subJobs.title.sector' , 'job.subStatus'])->withCount('attachments');
            $data['applications'] =   $data['applications']
            ->where('ref' , 'like' , '%'.$search.'%')
            ->orWhere('date' , 'like' , '%'.$search.'%')
            ->orWhere('address' , 'like' , '%'.$search.'%')
            ->orWhere('full_name' , 'like' , '%'.$search.'%')
            ->orWhere('father_name' , 'like' , '%'.$search.'%')
            ->orWhere('passport_no' , 'like' , '%'.$search.'%')
            ->orWhere('contact_no' , 'like' , '%'.$search.'%')
            ->orWhere('place_of_birth' , 'like' , '%'.$search.'%')
            ->orWhere('date_of_birth' , 'like' , '%'.$search.'%')
            ->orWhere('age' , 'like' , '%'.$search.'%')
            ->orWhere('relegion' , 'like' , '%'.$search.'%')
            ->orWhere('place_issued' , 'like' , '%'.$search.'%')
            ->orWhere('date_issued' , 'like' , '%'.$search.'%')
            ->orWhere('expiry_issued' , 'like' , '%'.$search.'%')
            ->orWhere('sex' , 'like' , '%'.$search.'%')
            ->orWhere('age' , 'like' , '%'.$search.'%')
            ->orWhere('children' , 'like' , '%'.$search.'%')
            ->orWhere('height' , 'like' , '%'.$search.'%')
            ->orWhere('weihgt' , 'like' , '%'.$search.'%')
            ->orWhere('nationality' , 'like' , '%'.$search.'%')
            ->orWhere('arabic_speak' , 'like' , '%'.$search.'%')
            ->orWhere('arabic_understand' , 'like' , '%'.$search.'%')
            ->orWhere('arabic_read' , 'like' , '%'.$search.'%')
            ->orWhere('arabic_write' , 'like' , '%'.$search.'%')
            ->orWhere('english_speak' , 'like' , '%'.$search.'%')
            ->orWhere('english_understand' , 'like' , '%'.$search.'%')
            ->orWhere('english_read' , 'like' , '%'.$search.'%')
            ->orWhere('english_write' , 'like' , '%'.$search.'%')
            ->orWhere('third_language' , 'like' , '%'.$search.'%')
            ->orWhere('hindi_understand' , 'like' , '%'.$search.'%')
            ->orWhere('hindi_read' , 'like' , '%'.$search.'%')
            ->orWhere('hindi_write' , 'like' , '%'.$search.'%')
            ->orWhere('visa_number' , 'like' , '%'.$search.'%')
            ->orWhere('flight_ticket' , 'like' , '%'.$search.'%')
            ->orWhere('recommendations' , 'like' , '%'.$search.'%')
            ->orWhere('applicant_interviewd_by' , 'like' , '%'.$search.'%')
            ->orWhere('min_salary' , 'like' , '%'.$search.'%')
            ->orWhereHas('job' , function($job) use($search){
                $job->where('post_number' ,  'like' , '%'.$search.'%');
            })
            ->orWhereHas('title' , function($title) use($search){
                $title->where('name'  , 'like' , '%'.$search.'%');
            })
            ->forwarded()
            ->simplePaginate(15);
            $data['sub_statuses'] =  subStatus::all();

        return view('user.employer.applications.all-applications' , $data);
    }//end method.



    /**
     * Filtering Client Applications
     */

    public function filterAgentApplicationsStatus(Request $request , $status)
    {
        $applications = Application::where('user_id' ,  Auth::id())
                        ->with(['job' ,  'job.title' , 'mainStatus.subStatus' , 'mainStatus'  , 'subStatus'])
                        ->with(['job.user:id,name' , 'job.subStatus'])
                        ->with('job.subJobs.title.sector')
                        ->withCount('notes')
                        ->whereHas('mainStatus' , function($q) use($status)
                        {
                            $q->where('name' , $status);
                        })
                        ->orderByDesc('created_at')
                        ->simplePaginate(15);
        return view('user.agent-applications_table' , compact('applications'));
    }//end method


    public function searchAgentApplications(Request $request)
    {
        $search = $request->search;
        $data['applications'] = Application::whereBelongsTo(Auth::user());
            $data['applications'] =   $data['applications']->with(['job' ,  'job.title' , 'mainStatus.subStatus' , 'mainStatus'  , 'subStatus'])
            ->with(['job.user:id,name' , 'job.subStatus'])
            ->with('job.subJobs.title.sector')
            ->withCount('notes')
            ->with(['job:id,post_number' , 'title' ,'user:id,name,type' , 'Job' , 'mainStatus' , 'subStatus'])
            ->with(['job.subJobs.title.sector' , 'job.subStatus'])->withCount('attachments')
            ->where('ref' , 'like' , '%'.$search.'%')
            ->orWhere('date' , 'like' , '%'.$search.'%')
            ->orWhere('address' , 'like' , '%'.$search.'%')
            ->orWhere('full_name' , 'like' , '%'.$search.'%')
            ->orWhere('father_name' , 'like' , '%'.$search.'%')
            ->orWhere('passport_no' , 'like' , '%'.$search.'%')
            ->orWhere('contact_no' , 'like' , '%'.$search.'%')
            ->orWhere('place_of_birth' , 'like' , '%'.$search.'%')
            ->orWhere('date_of_birth' , 'like' , '%'.$search.'%')
            ->orWhere('age' , 'like' , '%'.$search.'%')
            ->orWhere('relegion' , 'like' , '%'.$search.'%')
            ->orWhere('place_issued' , 'like' , '%'.$search.'%')
            ->orWhere('date_issued' , 'like' , '%'.$search.'%')
            ->orWhere('expiry_issued' , 'like' , '%'.$search.'%')
            ->orWhere('sex' , 'like' , '%'.$search.'%')
            ->orWhere('age' , 'like' , '%'.$search.'%')
            ->orWhere('children' , 'like' , '%'.$search.'%')
            ->orWhere('height' , 'like' , '%'.$search.'%')
            ->orWhere('weihgt' , 'like' , '%'.$search.'%')
            ->orWhere('nationality' , 'like' , '%'.$search.'%')
            ->orWhere('arabic_speak' , 'like' , '%'.$search.'%')
            ->orWhere('arabic_understand' , 'like' , '%'.$search.'%')
            ->orWhere('arabic_read' , 'like' , '%'.$search.'%')
            ->orWhere('arabic_write' , 'like' , '%'.$search.'%')
            ->orWhere('english_speak' , 'like' , '%'.$search.'%')
            ->orWhere('english_understand' , 'like' , '%'.$search.'%')
            ->orWhere('english_read' , 'like' , '%'.$search.'%')
            ->orWhere('english_write' , 'like' , '%'.$search.'%')
            ->orWhere('third_language' , 'like' , '%'.$search.'%')
            ->orWhere('hindi_understand' , 'like' , '%'.$search.'%')
            ->orWhere('hindi_read' , 'like' , '%'.$search.'%')
            ->orWhere('hindi_write' , 'like' , '%'.$search.'%')
            ->orWhere('visa_number' , 'like' , '%'.$search.'%')
            ->orWhere('flight_ticket' , 'like' , '%'.$search.'%')
            ->orWhere('recommendations' , 'like' , '%'.$search.'%')
            ->orWhere('applicant_interviewd_by' , 'like' , '%'.$search.'%')
            ->orWhere('min_salary' , 'like' , '%'.$search.'%')
            ->orWhereHas('job' , function($job) use($search){
                $job->where('post_number' ,  'like' , '%'.$search.'%');
            })
            ->orWhereHas('title' , function($title) use($search){
                $title->where('name'  , 'like' , '%'.$search.'%');
            })
            ->where('user_id' , Auth::id())
            ->orderByDesc('created_at')->simplePaginate(15);

        return view('livewire.user.employee.views.applications.all-applications' , $data );

    }
}
