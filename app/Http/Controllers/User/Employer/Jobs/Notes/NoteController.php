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
use App\Models\Application;
use App\Models\RefusedJob;
use App\Models\User;

class NoteController extends Controller
{
    public function index($id)
    {
        $job = Job::findOrFail($id);
        $notes = Note::where('job_id' ,  $id)->with('user')->whereHas('user' , function($q)
        {
            $q->where('type' , 'Admin');
        })->get();
        return view('user.employer.jobs.notes.all-job-notes' , compact('notes'  , 'job'));
    }

    public function store(CreateJobNoteRequest $request , $id)
    {
        $job = Job::findOrFail($id);
        $this->createJobNote($request->note , $id);
        $message = 'Note Sended Successfully';
        notify()->success($message);
        return redirect(route('employee.dashboard'));
    }//end method


    public function refuseJob(Request $request , $jobId)
    {
        $validate = Validator::make($request->all() , ['refuseReason' => 'required' , 'other_reason' => 'sometimes']);
        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors());
        }
        RefusedJob::create([
            'job_id' => $jobId,
            'user_id' => Auth::id(),
            'reason' => $request->other_reason != null ? $request->other_reason : $request->refuseReason,
        ]);
        DB::table('job_user')->where([['job_id' , $jobId] , ['user_id' , Auth::id()]])->delete();
        $this->deleteAllAgentApplications();
        notify()->success('Job Refused Successfully');
        return redirect(route('employee.dashboard'));
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


    public function sendJobNoteToAdmin(Request $request , $jobId)
    {
        $validate = Validator::make($request->all() , ['message'=>'required|string']);
        if($validate->fails())
        {
            $errors = '';
            notify()->error($validate->errors()->first());
            return redirect()->back();
        }
        Note::create(
            [
                'message' => $request->message,
                'user_id' => Auth::id(),
                'job_id' => $jobId,
            ]
        );
        notify()->success('note sended Successfully');
        return redirect()->back();
    }

    /**
     * Delete All The Agent Applciation and their notes and attachments after refusing his job
     */

    public function deleteAllAgentApplications()
    {
        Application::whereUserId(Auth::id())->delete();
    }
}
