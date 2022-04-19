<?php

namespace App\Http\Livewire\User\Employee\Views;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.user.employee.views.dashboard')->extends('layouts.user.employee.master')->section('content');
    }
}
