<?php

namespace App\Http\Livewire\Admin\Views\Settings\Nationalities;

use App\Models\Nationality;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AddNewNationality extends Component
{

    public $newNationality , $currentRoute;

    public function mount($id = null)
    {
        $this->currentRoute = Route::currentRouteName();
    }

    public function addNewNationality()
    {
        $this->validate(['newNationality' => 'required|string|max:255|unique:nationalities,name']);
        Nationality::create([
            'name' => $this->newNationality,
        ]);
        notify()->success('Nationality Added Successfully');
        return redirect(route($this->currentRoute));
    }
    public function render()
    {
        return view('livewire.admin.views.settings.nationalities.add-new-nationality')->extends('layouts.admin.master')->section('content');
    }
}
