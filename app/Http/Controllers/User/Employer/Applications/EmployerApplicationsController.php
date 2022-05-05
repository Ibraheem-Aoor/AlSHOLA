<?php

namespace App\Http\Controllers\User\Employer\Applications;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ApplicationNote;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployerApplicationsController extends Controller
{

    //Show All Applications forwarded To the employer form admin
    public function allForwardedApplications()
    {
        $jobIds = Job::whereBelongsTo(Auth::user())->pluck('id');
        $applications = Application::whereIn('job_id' , $jobIds)
                        ->where('forwarded' , true)
                        ->with(['job:id,post_number,title' , 'user:id,name,type'])
                        ->simplePaginate(15);
        return view('user.employer.applications.all-applications' , compact('applications'));
    }//end mthod



    //Send Note To Admin about a specific application
    public function sendNoteToAdmin(Request $request)
    {
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
                'application_id' => $request->application_id,
            ]
        );
        notify()->success('note sended Successfully');
        return redirect()->back();
    }


    // Accept Specific Application
    public function acceptApplication(Request $request)
    {
        $validate = Validator::make($request->all() , ['application_id'=>'required']);
        if($validate->fails())
        {
            notify()->error('something went wrong');
            return redirect()->back();
        }

        $application = Application::findOrFail($request->application_id);
        $application->status = 'waiting for medical';

    }
}
