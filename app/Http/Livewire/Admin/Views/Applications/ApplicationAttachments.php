<?php

namespace App\Http\Livewire\Admin\Views\Applications;

use App\Models\ApplicationAttachment;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ApplicationAttachments extends Component
{
    public $application_id , $currentRoute;
    public function mount($id)
    {
        $this->application_id = $id;
        $this->currentRoute = Route::currentRouteName();
    }

    public function passAttachmentTo($user  , $id)
    {
        $attachment = ApplicationAttachment::findOrFail($id);
        switch($user)
        {
            case 'employer': $attachment->is_forwarded_employer = true; break;
            case 'talent': $attachment->is_forwarded_talent = true; break;
        }
        $attachment->save();
        notify()->success('Attachment Send To '.$user.' Successfully');
        return redirect(route($this->currentRoute , $this->application_id));
    }

    public function deleteFile($id)
    {
        $file = ApplicationAttachment::findOrFail($id);
        Storage::delete('public/uploads/applications/'.$file->application_id.'/'.'attachments'.'/'.$file->name);
        $file->delete();
        notify()->success('File Deleted Successfully');
        return redirect(route($this->currentRoute));
    }


    public function render()
    {
        $attachments = ApplicationAttachment::where('application_id' , $this->application_id)
        ->with(['user:id,name,email,type'])
        ->orderByDesc('created_at')
        ->simplePaginate(15);
        return view('livewire.admin.views.applications.application-attachments'
                , [
                    'attachments' => $attachments
                ] )->extends('layouts.admin.master')->section('content');
    }
}
