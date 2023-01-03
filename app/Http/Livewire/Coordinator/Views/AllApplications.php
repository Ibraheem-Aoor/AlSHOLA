<?php

namespace App\Http\Livewire\Coordinator\Views;

use App\Http\Traits\Admin\User\ApplicationTrait;
use App\Models\Application;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Livewire\Component;

class AllApplications extends Component
{
    use ApplicationTrait;

    public $note , $applicationId  , $currentRouteName;


    public function mount($id = null)
    {
        $this->currentRouteName = FacadesRoute::currentRouteName();
    }


    public function deleteApplication( $id)
    {
        $application = Application::findOrFail($id);
        /*
        try
        {
            $this->deleteResumeFromStorage($id , $application->resume);
        }catch(Throwable $e)
        {
            return dd($e->getMessage());
        }*/
        $application->delete();
        notify()->success('Application Deleted Successfully');
        return redirect()->back();
    }

    public function deleteResumeFromStorage($jobId , $fileName)
    {
        return Storage::delete('public/uploads/applications/jobs/'.$jobId.'/'.Auth::id().'/'.$fileName);
    }




    //Accepting the application and forward it to employer.
    public function passApplicationToEmployer($id)
    {
        $application = Application::findOrFail($id);
        $application->forwarded = true;
        $application->save();
        notify()->success('Application Sended Successfully');
        return redirect(route('broker.applications.all'));
    }
    public function takeApplicationFromEmployer($id)
    {
        $application = Application::findOrFail($id);
        $application->forwarded = false;
        $application->save();
        notify()->success('Application Updated Successfully');
        return redirect(route('broker.applications.all'));
    }

    public function render()
    {
        $applications = Application::whereHas('job')->with(['user:id,name,email' , 'job.user' , 'subStatus' , 'title'] )->withCount(['notes' , 'attachments'])->orderByDesc('created_at')->simplePaginate(15);
        return view('livewire.coordinator.views.all-applications' , ['applications' => $applications])
        ->extends('layouts.coordinator.master')->section('content');
    }
}
