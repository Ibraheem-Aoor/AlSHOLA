<?php

namespace App\Http\Livewire\Coordinator\Views;

use App\Models\Currency;
use App\Models\Nationality;
use App\Models\Sector;
use App\Models\Title;
use App\Models\User;
use Livewire\Component;

class NewDemand extends Component
{
    public function render()
    {
        $data['clients'] = User::where('type' , 'Client')->get();
        $data['titles'] = Title::all();
        $data['nationalities'] = Nationality::orderBy('name')->get();
        $data['currencies'] = Currency::all();
        $data['sectors'] = Sector::all();
        return view('livewire.coordinator.views.new-demand' , $data)->extends('layouts.coordinator.master')->section('content');
    }
}
