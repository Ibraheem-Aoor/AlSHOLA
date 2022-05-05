<?php

namespace App\Http\Controllers\User\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Employee\Application\CreateApplicationRequest;
use App\Models\Application;
use App\Models\ApplicationNote;
use Illuminate\Http\Request;
use GeneaLabs\LaravelCaffeine\Tests\CreatesApplication;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function createApplication(CreateApplicationRequest $request , $jobId)
    {
        $cv = '';
        // Checking if the there is a prev cv uploaded and taking it if exists. else he should upload a cv
        if($request->has('prev_cv_checked'))
        {
            if(Auth::user()->cv != null)
            {
                $cv = Auth::user()->cv;
            }
            else
            {
                notify()->error('There is no previous CV');
                return redirect()->back();
            }
        }
        else
        {
            if($request->hasFile('cv'))
            {
                $file = $request->file('cv');
                $fileName  = $file->getClientOriginalName();
                $path = 'public/uploads/applications/jobs/'.$jobId.'/'.Auth::id().'/';
                $file->storeAs($path , $fileName);
                Application::create(
                    [
                        'cover_letter' => $request->get('cover_letter'),
                        'resume' => $fileName,
                        'user_id' => Auth::id(),
                        'job_id' => $jobId,
                    ]
                );
                notify()->success('Your Application Recevied Successfully');
                return redirect()->back();
            }
            else
            {
                notify()->error('Please Upload The CV');
                return redirect()->back();
            }
        }
    }//end method



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

    }
}
