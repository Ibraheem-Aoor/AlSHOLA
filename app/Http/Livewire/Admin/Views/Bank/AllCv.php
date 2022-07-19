<?php

namespace App\Http\Livewire\Admin\Views\Bank;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AllCv extends Component
{


    public function render()
    {
        $applications = Application::whereBelongsTo(Auth::user())->with(['attachments' , 'notes' , 'subStatus' , 'title' ,'job.subStatus'])->orderByDesc('created_at')->simplePaginate(15);
        return view('livewire.admin.views.bank.all-cv' , ['applications' => $applications])->extends('layouts.admin.master')->section('content');
    }
}
