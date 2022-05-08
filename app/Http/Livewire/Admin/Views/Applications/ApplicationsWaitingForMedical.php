<?php

namespace App\Http\Livewire\Admin\Views\Applications;

use App\Http\Traits\Admin\User\ApplicationTrait;
use App\Models\Application;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ApplicationsWaitingForMedical extends Component
{
    use ApplicationTrait;

    public $note , $applicationId , $currentRouteName;

    public function mount($id = null)
    {
        $this->currentRouteName = Route::currentRouteName();
    }


    public function render()
    {
        $applications = Application::where('status' , 'waiting for medical')->with(['user:id,name,email' , 'job:id,post_number'] )->withCount('notes')->simplePaginate(15);
        return view('livewire.admin.views.applications.applications-waiting-for-medical' ,
                    ['applications' => $applications])
                        ->extends('layouts.admin.master')->section('content');
    }
}
