<?php

namespace App\Http\Livewire\Admin\Views\Invoice;

use App\Models\Invoice;
use Livewire\Component;

class AllInvoices extends Component
{


    public function render()
    {
        $invoices = Invoice::with(['user' , 'subInvoices'])->whereHas('subInvoices')->simplePaginate(15);
        return view('livewire.admin.views.invoice.all-invoices' , ['invoices' => $invoices])->extends('layouts.admin.master')->section('content');
    }
}
