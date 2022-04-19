<?php

namespace App\Http\Livewire\User\Employer\Views;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.user.employer.views.dashboard')->extends('layouts.user.employer.master')->section('content');
    }
}
