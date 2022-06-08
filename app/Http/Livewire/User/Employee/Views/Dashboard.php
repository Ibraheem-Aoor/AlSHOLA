<?php

namespace App\Http\Livewire\User\Employee\Views;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class Dashboard extends Component
{
    public function render()
    {
        $avlialbeJobs = Auth::user()->jobs()->with('subJobs.title.sector')->get();
        return view('livewire.user.employee.views.dashboard' , ['avlialbeJobs' => $avlialbeJobs]
        )->extends('layouts.user.employee.master')->section('content');
    }
}
