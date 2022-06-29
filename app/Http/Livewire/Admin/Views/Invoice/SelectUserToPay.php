<?php

namespace App\Http\Livewire\Admin\Views\Invoice;

use Livewire\Component;

class SelectUserToPay extends Component
{
    public function render()
    {
        return view('livewire.admin.views.invoice.select-user-to-pay')->extends('layouts.admin.master')->section('content');
    }
}
