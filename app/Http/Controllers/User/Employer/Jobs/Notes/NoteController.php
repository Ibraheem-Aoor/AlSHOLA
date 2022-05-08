<?php

namespace App\Http\Controllers\User\Employer\Jobs\Notes;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\Employee\Note\CreateJobNoteRequest;

class NoteController extends Controller
{
    public function index($id)
    {
        $job = Job::select(['id' , 'title' , 'status'])->with('notes')->findOrFail($id);
        return view('user.employer.jobs.notes.all-job-notes' , compact('job'));
    }

    //This function either serve the refuse choice by sending a note that is nullable then remvoing the job from the user
    //Or send a comment form the employee to admin in order to report some job details with a required note.
    //And the user id represents the publisher
    public function store(CreateJobNoteRequest $request , $id)
    {
        $job = Job::findOrFail($id);
        switch(Route::currentRouteName())
        {
            case 'employee.job.refuse':
                $this->refuseJob($request->note , $job->id);
                $message = 'Job Offer refused Successfully';
                break;
                case 'employee.job.note.create':
                    $this->createJobNote($request->note , $id);
                    $message = 'Note Sended Successfully';
                break;
        }
        notify()->success($message);
        return redirect(route('employee.dashboard'));
    }//end method


    public function refuseJob($note , $jobId)
    {
        if($note != null)
        {
            $this->sendNote($note , $jobId);
        }
        DB::table('job_user')->where([['job_id' , $jobId] , ['user_id' , Auth::id()]])->delete();
    }


    public function createJobNote($note , $jobId)
    {
        $this->sendNote($note , $jobId);
    }


    public function sendNote($note , $id)
    {
        Note::create(
            [
                'message' => $note,
                'job_id' => $id,
                'user_id' => Auth::id()
            ]
        );
    }

}
