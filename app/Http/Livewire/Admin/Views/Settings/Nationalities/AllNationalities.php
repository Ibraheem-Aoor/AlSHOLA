<?php

namespace App\Http\Livewire\Admin\Views\Settings\Nationalities;

use App\Models\Nationality;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route ;
use Livewire\Component;

class AllNationalities extends Component
{
    public $newNationalityName ,   $targetNationalityId ,  $currentRoute;

    public function mount($id = null)
    {
        $this->currentRoute = Route::currentRouteName();
    }

    public function setTragetNationalityId($id)
    {
        $this->targetNationalityId = $id;
    }


    public function editNationality()
    {
        $this->validate(['newNationalityName'=> 'required|string|max:255|unique:nationalities,name,'.$this->id]);
        $nationality = Nationality::findOrFail($this->targetNationalityId);
        $nationality->name = $this->newNationalityName;
        $nationality->save();
        notify()->success('Nationality Updated successfully');
        return redirect(route($this->currentRoute));
    }

    public function deleteNationality($id)
    {
        Nationality::findOrFail($id)->delete();
        notify()->success('Nationality Updated successfully');
        return redirect(route($this->currentRoute));
    }

    public function render()
    {
        $nationalites = DB::table('nationalities')->simplePaginate(15);
        return view('livewire.admin.views.settings.nationalities.all-nationalities'
        , [
            'nationalites' => $nationalites,
        ]
    )->extends('layouts.admin.master')->section('content');
    }
}
