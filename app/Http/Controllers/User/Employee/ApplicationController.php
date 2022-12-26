<?php

namespace App\Http\Controllers\User\Employee;

use App\Http\Controllers\Controller;
use App\Http\Helpers\HistoryRecordHelper;
use App\Http\Livewire\Admin\Views\Applications\ApplicationAttachments;
use App\Http\Requests\User\Employee\Application\CreateApplicationRequest;
use App\Http\Traits\User\ApplicationAttachmentTrait;
use App\Models\Application;
use App\Models\ApplicationAttachment;
use App\Models\ApplicationNote;
use App\Models\Attachment;
use App\Models\Education;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Nationality;
use App\Models\Title;
use App\Models\User;
use App\Models\VisaInoformation;
use App\Notifications\ApplicationCreated;
use Illuminate\Http\Request;
use GeneaLabs\LaravelCaffeine\Tests\CreatesApplication;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ApplicationController extends Controller
{

    use ApplicationAttachmentTrait;

    public function showApplicationForm($id)
    {
        $job = Job::with(['subJobs.title.sector' , 'subStatus'])->findOrFail($id);
        $titlesArray = $job->subJobs->pluck('title');
        $titles = Title::whereIn('sector_id'  , $job->subJobs->pluck('title.sector.id'))->get();
        $nationalities = DB::table('nationalities')->get();
        $ref = $this->generateApplicationRef();
        return view('livewire.user.employee.views.applications.application-form' ,
                compact('job' , 'titles' , 'nationalities' , 'ref'));
    }



    function generateApplicationRef() {
        $number = 0;
        if(Application::count() == 0)
        {
            $number = 0;
        }else{
            $applicatinosRefs = Application::pluck('ref')->toArray();
            asort($applicatinosRefs);
            $number = (int)$applicatinosRefs[array_key_last($applicatinosRefs)];
        }
        // // call the same function if the barcode exists already
        // if ($this->applicationRefExists($number)) {
        //     return $this->generateApplicationRef();
        // }

        // otherwise, it's valid and can be used
        return $number + 1;
    }

    function applicationRefExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Application::where('ref' , $number)->exists();
    }//end method




    /**
     * Create the application with it's employer  and education recoreds
     * Each application has many employer experince records
     * Each application has many education records.
     */
    public function createApplication(CreateApplicationRequest $request , $jobId = null)
    {

        $application = Application::create(array_merge($request->all() , ['user_id' => Auth::id() , 'job_id' => $jobId ,
                'title_id' => $request->get('title') , 'main_status_id' => 2    , 'sub_status_id' => 6  ]));
        $return_route =  Auth::user()->type == 'Agent' ? (route('employee.dashboard')) : (Auth::user()->type == 'Admin' ?  (route('admin.dashboard')) : route('broker.dashboard'));
        try
        {
            $this->createEducationRecords($request->addMoreEducationRecords , $application->id);
            $this->createEmoployersRecords($request->addMoreInputFields  ,  $application->id);
            $this->storeApplicationAttachments($request->file('files'), $application->id);
            $this->storePersonalPhoto($request->file('photo') , $application->id);
            HistoryRecordHelper::registerApplicationLog('Application Created' .'<a href="/admin/application/'.$application->id.'/details">'.'( '.$application->ref.' )'.'</a>');
            $admin = User::where('type' , 'admin')->first();//ali
            FacadesNotification::send($admin , new ApplicationCreated($application));
            $message = Auth::user()->type == 'Agent' ? 'Application Send Successfully' : 'Application Created Successfully';
            notify()->success($message);
        }catch(Throwable $e)
        {
            notify()->error('something went wrong');
        }
        return redirect($return_route);

    }//end method

    /**
     * create emplyoer educational records
     */
    public function createEducationRecords($records , $applicationId)
    {
        foreach($records as $record)
        {
            Education::create(array_merge($record , ['application_id' => $applicationId  , 'collage' => $record['from'] ]));
        }
    }//end method

    /**
     * Create Employers Experince  records for this application
     */
    public function createEmoployersRecords($records , $applicationId)
    {
        foreach($records as $record)
        {
            Employer::create(array_merge($record , ['application_id' => $applicationId]));
        }
    }

    /**
     * store all the application attachments
     */
    public function storeApplicationAttachments($files , $applicationId)
    {
        foreach($files as $key => $file)
        {
            $fileName = $file->getClientOriginalName();
            $path = 'public/uploads/applications/'.$applicationId.'/'.'attachments'.'/';
            $file->storeAs($path , $fileName);
            ApplicationAttachment::create(
                [
                    'name' => $fileName,
                    'user_id' => Auth::id(),
                    'application_id'=> $applicationId,
                    'is_forwarded_talent' => true,
                    'is_forwarded_employer' => false,
                    'type' => $key, //the key of the file represnets it's type
                ]
            );
        }
    }//end method

    public function storePersonalPhoto($photo , $applicationId)
    {
        $photoName = time().'.'.$photo->getClientOriginalExtension();
        $path = 'public/uploads/applications/'.$applicationId.'/'.'attachments'.'/';
        $photo->storeAs($path , $photoName);
        ApplicationAttachment::create(
            [
                'name' => $photoName,
                'user_id' => Auth::id(),
                'application_id'=> $applicationId,
                'is_forwarded_talent' => true,
                'is_forwarded_employer' => false,
                'type' => 'Personal Photo',
            ]
            );
    }


    // all applications of the employee
    public function allApplications()
    {
        $applications = Application::where('user_id' , Auth::id())
                        ->with(['job' ,  'job.title' , 'mainStatus.subStatus' , 'mainStatus'  , 'subStatus' , 'title'])
                        ->with(['job.user:id,name' , 'job.subStatus'])
                        ->with('job.subJobs.title.sector')
                        ->withCount('notes')
                        ->orderByDesc('created_at')
                        ->simplePaginate(15);
        return view('livewire.user.employee.views.applications.all-applications' , compact('applications'));
    }


    // Show all the notes of a specfic application
    public function applicationNotes($id)
    {
        $notes = ApplicationNote::where('application_id' , $id)
                    ->with(['application.job:id,post_number' , 'application.job.title', 'user'])
                    ->whereHas('user' , function($q)
                    {
                        $q->where('type' , 'Admin');
                    })
                        ->orderByDesc('id')
                        ->simplePaginate(15);
        return view('livewire.user.employee.views.applications.notes.application-notes' , compact('notes'));

    }//end metohd



    // Show all applications watiting for medical
    public function medicalApplications()
    {
        $applications = Application::whereBelongsTo(Auth::user())
                        ->where('status' , 'waiting for medical')
                        ->with(['job.title' , 'job.subStatus'])
                        ->withCount('notes')
                        ->orderByDesc('id')
                        ->simplePaginate();
        return view('livewire.user.employee.views.applications.all-applications' , compact('applications'));
    }//end method


    public function visaApplications()
    {
        $applications = Application::whereBelongsTo(Auth::user())
                        ->where('status' , 'waiting for visa')
                        ->with(['job.title'])
                        ->withCount('attachments')
                        ->orderByDesc('id')
                        ->simplePaginate();
        return view('livewire.user.employee.views.applications.applications-watiing-for-visa' , compact('applications'));
    }//end method


    //talent should ulpload ticket file and insert data
    public function createApplicationVisaTicket(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'file' => 'required|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            'ticket' => 'required|',
            'arrival_date' => 'required',
        ]);
        if($validate->fails())
        {
            notify()->error($validate->errors());
            return redirect()->back();
        }
        $this->uploadApplicationAttachment($request);
        $application = Application::with('visa')->findOrFail($request->id);
        $application->visa->ticket = $request->ticket;
        $application->visa->arrival_date = $request->arrival_date;
        $application->visa->save();
        $application->save();
        notify()->success('Ticket Data Sended Successfully');
        return redirect()->back();
    }//end method



    //SHOW ALL THE ATTACHMENTS OF A SPECIFIC EMPLOYER
    public function applicationAttachments($id)
    {

        $attachments = ApplicationAttachment::where([['application_id' , $id ,] , ['is_forwarded_talent' , true]])
        ->with(['user:id,name,email' , 'application.job:id,post_number'])
        ->simplePaginate(15);
        return view('livewire.user.employee.views.applications.application-attachments' , compact('attachments'));
    }//end method


    /**
     * Reply with a note from the application's owner (Employee user)
     */
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
    }//end method



    public function getDetails($id)
    {
        $application = Application::with(['job:id,post_number' , 'employers' , 'user'  , 'title.sector', 'attachments' ,'educations' , 'job.broker' , 'nationality' , 'subStatus'])->with('job.subJobs.title.sector')->findOrFail($id);
        $totalExperince = Employer::whereApplicationId($application->id)->sum('duration');
        return view('livewire.user.employee.views.applications.application-details' , compact('application'  , 'totalExperince'));
    }//end



}
