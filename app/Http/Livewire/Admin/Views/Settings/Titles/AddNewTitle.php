<?php

namespace App\Http\Livewire\Admin\Views\Settings\Titles;

use App\Models\Sector;
use App\Models\Title;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AddNewTitle extends Component
{

    public $newTitle , $currentRoute;

    public function mount($id = null)
    {
        $this->currentRoute = Route::currentRouteName();
    }
    public function addNewTitle()
    {
        $this->validate([
            'newTitle' => 'required|string|max:255|unique:sectors,name',
        ]);
        Title::create([
            'name' => $this->newTitle,
        ]);
        notify()->success('Title Added Successfully');
        return redirect(route($this->currentRoute));
    }
    public function render()
    {
        $sectors = Sector::all();
        return view('livewire.admin.views.settings.titles.add-new-title'
        , [
            'sectors' => $sectors,
        ]
        )->extends('layouts.admin.master')->section('content');
    }
}
