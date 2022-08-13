<?php

namespace App\Http\Controllers\User\Employer\Applications;

use App\Http\Controllers\Controller;
use App\Http\Helpers\HistoryRecordHelper;
use App\Http\Traits\User\ApplicationAttachmentTrait;
use App\Models\Application;
use App\Models\ApplicationAttachment;
use App\Models\ApplicationNote;
use App\Models\Employer;
use App\Models\Job;
use App\Models\RefusedApplications;
use App\Models\subStatus;
use App\Models\User;
use App\Models\VisaInoformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployerApplicationsController extends Controller
{

    /**
     * This Class handles the applications for the client side.
     */

    use ApplicationAttachmentTrait;


    //Show All Applications forwarded To the employer form admin
    public function allForwardedApplications($id = null)
    {
        $jobIds = Job::whereBelongsTo(Auth::user())->pluck('id');
        $data['applications'] = Application::whereIn('job_id' , $jobIds)
                        ->where('forwarded' , true)
                        ->with(['job' => function($job){
                            $job->with(['subJobs.title.sector' , 'subStatus']);
                        },
                            'title' ,'user:id,name,type' , 'Job' , 'mainStatus' , 'subStatus' ])->withCount('attachments')
                        ->orderByDesc('created_at')
                        ->simplePaginate(15);
            $data['sub_statuses'] =  subStatus::all();
        return view('user.employer.applications.all-applications' , $data);
    }//end mthod


    /**
     * return all selected job applications
     */
    public function getAllApplications($id)
    {
        $job = Job::findOrFail($id);
        $user = User::findOrFail(Auth::id());
        $data['applications']  = Application::whereJobId($id)
                        ->where('forwarded' , true)
                        ->with(['job:id,post_number' , 'title' ,'user:id,name,type' , 'Job' , 'mainStatus' , 'subStatus' , 'attachments' ])
                        ->withCount('attachments')
                        ->with(['job.subJobs' , 'job.subStatus'])
                        ->simplePaginate(15);
        $data['sub_statuses'] =  subStatus::all();

        return view('user.employer.applications.all-applications' , $data);
    }//end method

    public function allMedicalApplications()
    {
        $jobIds = Job::whereBelongsTo(Auth::user())->pluck('id');
        $applications = Application::whereIn('job_id' , $jobIds)
        ->where([['forwarded' , true ], ['status' , 'waiting for medical']])
        ->with(['job:id,post_number,title' , 'user:id,name,type'])
        ->withCount('attachments')
        ->simplePaginate(15);
        return view('user.employer.applications.applications-waiting-for-medical' , compact('applications'));
    }//end method



    // all application watiting for visa
    public function allVisaApplications()
    {
        $jobIds = Job::whereBelongsTo(Auth::user())->pluck('id');
        $applications = Application::whereIn('job_id' , $jobIds)
        ->where([['forwarded' , true ], ['status' , 'waiting for visa']])
        ->with(['job:id,post_number,title' , 'user:id,name,type' , 'visa'])
        ->withCount('attachments')
        ->simplePaginate(15);
        return view('user.employer.applications.applications-waiting-for-visa' , compact('applications'));

    }//end method

    public function createVisa(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'file' => 'required|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            'number' => 'required|',
            'expire_date' => 'required',
        ]);

        if($validate->fails())
        {
            notify()->error($validate->errors());
            return redirect()->back();
        }
        $this->uploadApplicationAttachment($request);
        $application = Application::with('visa')->findOrFail($request->id);
        $application->visa->visa_number = $request->number;
        $application->visa->visa_expire_date = $request->expire_date;
        $application->visa->save();
        $application->save();
        notify()->success('Visa Data Sended Successfully');
        return redirect()->back();
    }

    //upgrade application from current status to next stage.
    public function UpgradeApplicationToNextStage(Request $request)
    {
        $validate = Validator::make($request->all() , ['application_id'=>'required']);
        if($validate->fails())
        {
            notify()->error('something went wrong');
            return redirect()->back();
        }
        $application = Application::findOrFail($request->application_id);
        $newStatus = '';
        switch($application->status)
        {
            case 'waiting for medical': $newStatus = 'waiting for visa';break;
        }
        $application->status = $newStatus;
        $application->save();
        if($newStatus == 'waiting for visa')
        {
            notify()->success('Waiting for visa doucment');
            return redirect(route('employer.applications.visa'));
        }
    }//end method


    // application attachments
    public function applicationAttachments($id)
    {

        $attachments = ApplicationAttachment::where([['application_id' , $id ,] , ['is_forwarded_employer' , true]])
        ->with(['user:id,name,email' , 'application.job:id,post_number'])
        ->simplePaginate(15);
        return view('user.employer.applications.attachments.application-attachments' , compact('attachments'));
    }//end method


    //Send Note To Admin about a specific application
    public function sendNoteToAdmin(Request $request , $id)
    {
        $application = Application::findOrFail($id);
        $validate = Validator::make($request->all() , ['message'=>'required|string']);
        if($validate->fails())
        {
            $errors = '';
            // foreach($validate->errors()->messages() as $error)
                // $errors .= (string)$error;
            notify()->error($validate->errors()->first());
            return redirect()->back();
        }
        ApplicationNote::create(
            [
                'message' => $request->message,
                'user_id' => Auth::id(),
                'application_id' => $application->id,
            ]
        );
        notify()->success('note sended Successfully');
        return redirect()->back();
    }//end method


    // Accept Specific Application
    public function acceptApplication(Request $request , $id)
    {
        $validate = Validator::make($request->all(),[
            'files.*' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            'file_type' => 'required|string',
            'visa_number' => 'nullable|string',
            'flight_ticket' => 'nullable|string',
        ]);
        if($validate->fails())
        {
            notify()->error($validate->errors()->first());
            return redirect()->back();
        }

        if($id != null)
        {

            $application = Application::with('job:id')->findOrFail($id);
            $files = $request->file('files');
            if($request->hasFile('files'))
            {
                foreach($files as $file)
                {
                    $fileName  = $file->getClientOriginalName();
                    $path = 'public/uploads/applications/'.$application->id.'/'.'attachments'.'/';
                    $file->storeAs($path , $fileName);
                    $attachment  = ApplicationAttachment::create(
                        [
                            'name' => $fileName,
                            'user_id' => Auth::id(),
                            'application_id' => $application->id,
                            'is_forwarded_talent' => Auth::user()->type == 'Agent' ? true : false,
                            'is_forwarded_employer' => Auth::user()->type == 'Agent' ? false : true,
                            'type' => $request->file_type,
                            ]
                        );
                    }
            }//end if

        $application->visa_number = $request->visa_number;
        // $application->flight_ticket = $request->flight_ticket;
        $application->save();
        }//end if
        $application = Application::findOrFail($id);
        $subStatus = subStatus::where('name' , 'waiting for medical')->first();
        $application->sub_status_id = $subStatus->id;
        $application->main_status_id = $subStatus->mainStatus->id;
        $application->is_accepted = true;
        $application->save();
        HistoryRecordHelper::registerApplicationLog('Application Accepted' .'<a href="/admin/application/'.$application->id.'/details">'.'( '.$application->ref.' )'.'</a>');
        notify()->success('Job Accepted Successfully');
        return redirect()->back();
    }//end method



    public function getDetails($id)
    {
        $application = Application::with(['job:id,post_number' , 'employers' , 'user' ,  'subStatus' , 'title.sector', 'attachments' ,'educations' , 'job.subStatus' , 'nationality']   )->with('job.subJobs.title.sector')->findOrFail($id);
        $totalExperince = Employer::whereApplicationId($application->id)->sum('duration');
        return view('user.employer.applications.application-details' , compact('application'  , 'totalExperince'));
    }//end


    public function refuseApplication(Request $request , $id)
    {
        $application = Application::findOrFail($id);
        $validate = Validator::make($request->all() , ['reason' => 'required|string']);
        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors()->first());
        }
        RefusedApplications::create([
            'application_id' => $application->id,
            'user_id' => Auth::id(),
            'reason' => $request->reason,
        ]);
        $application->forwarded = false;
        $application->save();
        HistoryRecordHelper::registerApplicationLog('Application Rejected' .'<a href="/admin/application/'.$application->id.'/details">'.'( '.$application->ref.' )'.'</a>');
        notify()->success('Application Rejected Successfully');
        return redirect(route('employer.dashboard'));
    }
}
