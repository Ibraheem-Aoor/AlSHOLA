<?php

namespace App\Http\Livewire\User\Employee\Views;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AvilabeJobs extends Component
{
    public function render()
    {
        $avlialbeJobs = Auth::user()->jobs()->paginate(15);
        return view('livewire.user.employee.views.avilabe-jobs' , [
            'avlialbeJobs' => $avlialbeJobs
        ])->extends('layouts.user.employee.master')->section('content');
    }
}