<?php

namespace App\Http\Livewire\Admin\Views\Invoice;

use App\Models\Invoice;
use App\Models\Job;
use App\Models\User;
use Livewire\Component;

class SelectAgent extends Component
{
    public $invoice;
    public function mount($invoiceId , $jobId)
    {
        $this->invoice = Invoice::findOrFail($invoiceId);
        $this->job = Job::findOrFail($jobId);
    }

    public function selectInvoiceUser($id)
    {
        $user = User::findOrFail($id);
        $this->invoice->user_id = $user->id;
        $this->invoice->save();
        return redirect(route('admin.invoice.client' , ['invoiceId' => $this->invoice->id , 'jobId' => $this->job->id]));

    }
    public function render()
    {
        $users = User::where('type' , 'Agent')->simplePaginate(15);
        return view('livewire.admin.views.invoice.select-agent' , ['users' => $users])->extends('layouts.admin.master')->section('content');
    }
}
