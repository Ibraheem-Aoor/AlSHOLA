<?php

namespace App\Http\Livewire\Admin\Views\Applications;

use App\Http\Traits\Admin\User\ApplicationTrait;
use App\Models\Application;
use App\Models\ApplicationNote;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Throwable;

class AllAplications extends Component
{
    use ApplicationTrait;

    public $note , $applicationId  , $currentRouteName;


    public function mount($id = null)
    {
        $this->currentRouteName = Route::currentRouteName();
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
        return redirect(route('admin.applications.all'));
    }

    public function render()
    {
        $applications = Application::with(['user:id,name,email' , 'job:id,post_number'] )->withCount('notes')->simplePaginate(15);
        return view('livewire.admin.views.applications.all-aplications' , ['applications' => $applications])
        ->extends('layouts.admin.master')->section('content');
    }
}
