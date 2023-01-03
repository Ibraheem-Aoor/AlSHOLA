<?php

namespace App\Http\Livewire\Coordinator\Views;

use App\Models\Application;
use App\Models\Title;
use Livewire\Component;

class ApplicationEdit extends Component
{

    public $application_id;
    public function mount($id)
    {
        $this->application_id = $id;
    }
    public function render()
    {
        $data['application'] = Application::query()->find($this->application_id);
        $data['titles'] = Title::all();
        return view('livewire.coordinator.views.application-edit' , $data)->extends('layouts.coordinator.master')->section('content');
    }
}
