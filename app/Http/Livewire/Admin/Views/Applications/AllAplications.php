<?php

namespace App\Http\Livewire\Admin\Views\Applications;

use App\Http\Traits\Admin\User\ApplicationTrait;
use App\Models\Application;
use App\Models\ApplicationNote;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Throwable;
use App\Notifications\NewApplicationActionNotficaition;
use App\Notifications\NewDemandActionNotification;
use Illuminate\Support\Facades\Notification;

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
        $application = Application::with('job.user')->findOrFail($id);
        $application->forwarded = true;
        $application->save();
        $notification = new NewDemandActionNotification(['msg' => 'New Application' , 'link' => route('employer.application.details' , $application->id)]);
        $user = User::find($application->job->user->id);
        Notification::send( $user , $notification);
        notify()->success('Application Sended Successfully');
        return redirect(route('admin.applications.all'));
    }
    public function takeApplicationFromEmployer($id)
    {
        $application = Application::findOrFail($id);
        $application->forwarded = false;
        $application->save();
        notify()->success('Application Updated Successfully');
        return redirect(route('admin.applications.all'));
    }

    public function render()
    {
        $user_layout = Auth::user()->type == 'Admin' ? 'layouts.admin.master' : 'layouts.coordinator.master';
        $applications = Application::with(['user:id,name,email' , 'job.user' , 'subStatus' , 'title'] )->withCount(['notes' , 'attachments'])->orderByDesc('created_at')->simplePaginate(15);
        return view('livewire.admin.views.applications.all-aplications' , ['applications' => $applications])
        ->extends($user_layout)->section('content');
    }
}
