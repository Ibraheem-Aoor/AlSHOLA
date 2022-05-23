<?php

namespace App\Http\Livewire\Admin\Views\Applications;

use App\Models\Application;
use App\Models\ApplicationNote;
use App\Models\ApplicationStatusHistory;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Livewire\Component;

class ApplicationDetails extends Component
{
    public $application , $note , $currentRoute , $status;

    public function mount($id)
    {
        $this->application = Application::with(['user' , 'job:id,post_number' , 'job.title' , 'employers' , 'notes' , 'statusHistory'])
        ->with(['job.title.sector' , 'notes.user' , 'statusHistory.user:id,name'])
        ->findOrFail($id);
        $this->status = $this->application->status;
        $this->currentRoute = FacadesRoute::currentRouteName();
    }



    //Accepting the application and forward it to employer.
    public function passApplicationToEmployer()
    {
        $this->application->forwarded = true;
        $this->application->save();
        notify()->success('Application Sended Successfully');
        return redirect(route('admin.applications.all'));
    }

    /**
     * Send Applictino Note To Agent
     */

    public function sendApplicationNote()
    {
        ApplicationNote::create(
            [
                'application_id' => $this->application->id,
                'user_id' => Auth::id(),
                'message' => $this->note,
            ]
        );
        notify()->success('Note Sended Successfully');
        return redirect(route($this->currentRoute , $this->application->id));
    }


    /**
     * Change Application Status
     */

    public function changeStatus()
    {
        $hisory = new ApplicationStatusHistory();
        $hisory->prev_status  = $this->application->status;
        $this->application->status = $this->status;
        $hisory->status = $this->application->status;
        $hisory->application_id = $this->application->id;
        $hisory->user_id = Auth::id();
        $hisory->save();
        $this->application->save();
        notify()->success('Note Sended Successfully');
        return redirect(route($this->currentRoute , $this->application->id));
    }

    public function render()
    {
        return view('livewire.admin.views.applications.application-details') ->extends('layouts.admin.master')->section('content');
    }
}
