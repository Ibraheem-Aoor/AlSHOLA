<?php

namespace App\Http\Livewire\Admin\Views\Applications;

use App\Http\Helpers\HistoryRecordHelper;
use App\Models\Application;
use App\Models\ApplicationMainStatus;
use App\Models\ApplicationNote;
use App\Models\ApplicationStatusHistory;
use App\Models\Note;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Livewire\Component;

class ApplicationDetails extends Component
{
    public $application , $note , $currentRoute , $mainStatus , $subStatus , $unreadNotes;
    public function mount($id)
    {
        $this->currentRoute = FacadesRoute::currentRouteName();
        $this->application = Application::with(['user' , 'job.terms' , 'job.title' ,
                                                'employers' , 'notes' ,
                                                'statusHistory' , 'mainStatus' , 'subStatus' , 'educations' , 'attachments' , 'refused' ])
        ->with(['job.subJobs.title.sector' , 'notes.user' , 'statusHistory.user:id,name'])
        ->findOrFail($id);
        $this->status = $this->application->status;
        $this->unreadNotes = $this->application->notes->where('seen', false)->count();
        // return dd($this->application->job->terms()->where('user_id' , $this->application->user->id)->get());
    }



    //Accepting the application and forward it to employer.
    public function passApplicationToEmployer()
    {
        $this->application->forwarded = true;
        $this->application->save();
        HistoryRecordHelper::registerApplicationLog('Application Sended To Employer' .'<a href="/admin/application/'.$this->application->id.'/details">'.'( '.$this->application->ref.' )'.'</a>');
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
        HistoryRecordHelper::registerApplicationLog('Application PDF Printing' .'<a href="/admin/application/'.$this->application->id.'/details">'.'( '.$this->application->ref.' )'.'</a>');
        notify()->success('Note Sended Successfully');
        return redirect(route($this->currentRoute , $this->application->id));
    }


    /**
     * Change Application Status
     */

    public function changeStatus()
    {
        $this->validate($this->rules() , $this->messages());
        $hisory_1 = new ApplicationStatusHistory();
        $hisory_1->prev_status  = $this->application->subStatus->name;
        $this->application->sub_status_id = $this->subStatus;
        $this->application->save();
        $hisory_1->status = $this->application->subStatus->name;
        $hisory_1->application_id = $this->application->id;
        $hisory_1->user_id = Auth::id();
        $hisory_1->save();
        $this->application->main_status_id = $this->mainStatus;
        $this->application->save();
        notify()->success('Status Updated Successfully');
        return redirect(route($this->currentRoute , $this->application->id));
    }

    public function rules()
    {
        return [
            'mainStatus' => 'required',
            'subStatus' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'mainStatus.required' => 'This Field is required',
            'subStatus.required' => 'This Field is required',
        ];
    }

    public function setReadNote($id)
    {
        $note = Note::findOrFail($id);
        $note->seen = true;
        $note->save();
    }


    /**
     * Forward Application Attachment to Emplyoer
     */
    public function passAttachmentToEmployer($id)
    {
        $attachment = $this->application->attachments->where('id' , $id)->first();
        $attachment->is_forwarded_employer = true;
        $attachment->save();
        notify()->success('Forwarded Successfully');
        return redirect(route($this->currentRoute , $this->application));
    }
    public function passAttachmentToEmployee($id)
    {
        $attachment = $this->application->attachments->where('id' , $id)->first();
        $attachment->is_forwarded_talent = true;
        $attachment->save();
        notify()->success('Forwarded Successfully');
        return redirect(route($this->currentRoute , $this->application));
    }





    public function render()
    {
        $mainStatuses = ApplicationMainStatus::all();
        return view('livewire.admin.views.applications.application-details' , ['mainStatuses' => $mainStatuses]) ->extends('layouts.admin.master')->section('content');
    }
}
