<?php

namespace App\Http\Livewire\Admin\Views;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.views.dashboard')->extends('layouts.admin.master')->section('content');
    }
}
