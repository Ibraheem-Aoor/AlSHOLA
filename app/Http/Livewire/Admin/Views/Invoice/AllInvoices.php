<?php

namespace App\Http\Livewire\Admin\Views\Invoice;

use App\Models\Invoice;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AllInvoices extends Component
{
    public $currentRoute;
    public function mount()
    {
        $this->currentRoute = Route::currentRouteName();
    }

    public function deleteInvoice($id)
    {
        Invoice::findOrFail($id)->delete();
        notify()->success('Invoice Deleted Successfully');
        return redirect(route($this->currentRoute));
    }

    public function updateInvoiceStatus()
    {
        return dd($this->selectInvoiceId);
    }



    public function render()
    {
        $invoices = Invoice::with(['user' , 'subInvoices'])->whereHas('subInvoices')->simplePaginate(15);
        return view('livewire.admin.views.invoice.all-invoices' , ['invoices' => $invoices])->extends('layouts.admin.master')->section('content');
    }
}
