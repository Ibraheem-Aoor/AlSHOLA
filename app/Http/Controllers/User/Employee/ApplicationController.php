<?php

namespace App\Http\Controllers\User\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Employee\Application\CreateApplicationRequest;
use App\Http\Traits\User\ApplicationAttachmentTrait;
use App\Models\Application;
use App\Models\ApplicationAttachment;
use App\Models\ApplicationNote;
use App\Models\Attachment;
use App\Models\Job;
use App\Models\Nationality;
use App\Models\Title;
use App\Models\VisaInoformation;
use Illuminate\Http\Request;
use GeneaLabs\LaravelCaffeine\Tests\CreatesApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ApplicationController extends Controller
{

    use ApplicationAttachmentTrait;

    public function showApplicationForm($id)
    {
        $job = Job::with(['title.sector'])->findOrFail($id);
        $titles = Title::all();
        $nationalities = DB::table('nationalities')->get();
        return view('livewire.user.employee.views.applications.application-form' , compact('job' , 'titles' , 'nationalities'));
    }
    public function createApplication(CreateApplicationRequest $request , $jobId)
    {
        return dd($request);
    }


    public function storeApplication( $coverLetter , $fileName , $jobId)
    {
        Application::create(
            [
                'cover_letter' => $coverLetter,
                'resume' => $fileName,
                'user_id' => Auth::id(),
                'job_id' => $jobId,
            ]
        );
    }

    // all applications of the employee
    public function allApplications()
    {
        $applications = Application::where('user_id' , Auth::id())
                        ->with(['user:id,email,name' , 'job:id,post_number,title'])
                        ->withCount('notes')
                        ->orderByDesc('id')
                        ->simplePaginate(15);
        return view('livewire.user.employee.views.applications.all-applications' , compact('applications'));
    }


    // Show all the notes of a specfic application
    public function applicationNotes($id)
    {
        $notes = ApplicationNote::where('application_id' , $id)
                    ->with('application.job:id,title,post_number')
                        ->orderByDesc('id')
                        ->simplePaginate(15);
        return view('livewire.user.employee.views.applications.notes.application-notes' , compact('notes'));

    }//end metohd



    // Show all applications watiting for medical
    public function medicalApplications()
    {
        $applications = Application::whereBelongsTo(Auth::user())
                        ->where('status' , 'waiting for medical')
                        ->with('job:id,title,post_number')
                        ->withCount('notes')
                        ->orderByDesc('id')
                        ->simplePaginate();
        return view('livewire.user.employee.views.applications.all-applications' , compact('applications'));
    }//end method


    public function visaApplications()
    {
        $applications = Application::whereBelongsTo(Auth::user())
                        ->where('status' , 'waiting for visa')
                        ->with('job:id,title,post_number')
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
        ->with(['user:id,name,email' , 'application.job:id,post_number,title'])
        ->simplePaginate(15);
        return view('livewire.user.employee.views.applications.application-attachments' , compact('attachments'));
    }//end method





}
