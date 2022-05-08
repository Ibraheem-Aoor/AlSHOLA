<?php

namespace App\Http\Livewire\Admin\Views\Applications;

use App\Http\Traits\Admin\User\ApplicationTrait;
use App\Models\Application;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Livewire\Component;

class ApplicationsWaitingForVisa extends Component
{

    use ApplicationTrait;

    public $note , $applicationId , $currentRouteName;

    public function mount($id = null)
    {
        $this->currentRouteName = FacadesRoute::currentRouteName();
    }

    public function render()
    {
        $applications = Application::where('status' , 'waiting for visa')
                    ->with(['user:id,name,email' , 'job:id,post_number'] )
                    ->withCount('notes')
                    ->simplePaginate(15);
        return view('livewire.admin.views.applications.applications-waiting-for-visa' ,
    [
        'applications' => $applications
    ])->extends('layouts.admin.master')->section('content');
    }//end method
}
