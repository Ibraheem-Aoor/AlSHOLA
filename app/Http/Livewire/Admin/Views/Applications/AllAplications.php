<?php

namespace App\Http\Livewire\Admin\Views\Applications;

use App\Models\Application;
use App\Models\ApplicationNote;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Throwable;

class AllAplications extends Component
{


    public $note , $applicationId;


      //download application file
    public function downloadCv($name , $jobId)
    {
        return redirect(route('cv.download',[ 'jobId' => $jobId ,  'fileName' => $name]));
    }

    public function deleteApplication( $id)
    {
        $application = Application::findOrFail($id);
        try
        {
            $this->deleteResumeFromStorage($id , $application->resume);
        }catch(Throwable $e)
        {
            return dd($e->getMessage());
        }
        $application->delete();
        notify()->success('Application Deleted Successfully');
        return redirect()->back();
    }

    public function deleteResumeFromStorage($jobId , $fileName)
    {
        return Storage::delete('public/uploads/applications/jobs/'.$jobId.'/'.Auth::id().'/'.$fileName);
    }


    public function setCurrentApplicationId($id)
    {
        $this->applicationId = $id;
    }



    //Accepting the application and forward it to employer.
    public function passApplicationToEmployer($id)
    {
        $application = Application::findOrFail($id);
        $application->forwarded = true;
        $application->save();
        notify()->success('Application Sended Successfully');
        return redirect(route('admin.applications.all'));
    }



    //Send note without refuse
    public function sendNoteToAppliedTalent()
    {
        $this->validate(['note' => 'required' , 'applicationId' => 'required']);
        ApplicationNote::create([
            'user_id' => Auth::id(),
            'application_id' => $this->applicationId,
            'message' => $this->note,
        ]);
        notify()->success('Note Sended Successfully');
        return redirect(route('admin.applications.all'));
    }

    public function render()
    {
        $applications = Application::with(['user:id,name,email' , 'job:id,post_number'] )->withCount('notes')->simplePaginate(15);
        return view('livewire.admin.views.applications.all-aplications' , ['applications' => $applications])
        ->extends('layouts.admin.master')->section('content');
    }
}
