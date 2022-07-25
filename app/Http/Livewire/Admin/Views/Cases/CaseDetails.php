<?php

namespace App\Http\Livewire\Admin\Views\Cases;

use App\Models\CaseMessage;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PhpParser\Node\Stmt\Case_;

class CaseDetails extends Component
{

    public $case , $message;

    public function mount($id)
    {
        $this->case = Ticket::with(['application.job:id,post_number' , 'attachments.user' , 'messages.user'])->findOrFail($id);
    }//end mount


    public function addMessage()
    {
        $this->validate(['message' =>'required']);
        $caseMessage = new CaseMessage();
        $caseMessage->user_id = Auth::id();
        $caseMessage->ticket_id = $this->case->id;
        $caseMessage->message = $this->message;
        $caseMessage->save();
        notify()->success('Message Added Successfully');
        return redirect(route('admin.case.details' , $this->case->id ));
    }//End addMessage

    public function render()
    {
        return view('livewire.admin.views.cases.case-details')
        ->extends('layouts.admin.master')->section('content');
    }//end render
}
