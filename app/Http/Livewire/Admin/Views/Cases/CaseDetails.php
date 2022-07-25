<?php

namespace App\Http\Livewire\Admin\Views\Cases;

use App\Models\Ticket;
use Livewire\Component;
use PhpParser\Node\Stmt\Case_;

class CaseDetails extends Component
{

    public $case;

    public function mount($id)
    {
        $this->case = Ticket::with(['application.job:id,post_number' , 'attachments.user'])->findOrFail($id);
    }//end mount

    public function render()
    {
        return view('livewire.admin.views.cases.case-details')
        ->extends('layouts.admin.master')->section('content');
    }//end render
}
