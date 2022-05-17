<?php

namespace App\Http\Livewire\Admin\Views\Settings\Sectors;

use App\Models\Sector;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AddNewSector extends Component
{
    public $newSector , $currentRoute;


    public function mount($id = null)
    {
        $this->currentRoute = Route::currentRouteName();
    }
    public function addNewSector()
    {
        $this->validate(['newSector' => 'required|string|max:255|unique:sectors,name']);
        Sector::create([
            'name' => $this->newSector,
        ]);
        notify()->success('Category Added Successfully');
        return redirect(route($this->currentRoute));
    }

    public function render()
    {
        return view('livewire.admin.views.settings.sectors.add-new-sector')->extends('layouts.admin.master')->section('content');
    }
}
