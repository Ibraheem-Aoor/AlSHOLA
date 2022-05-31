<?php

namespace App\Http\Livewire\Admin\Views\Settings\Currency;

use App\Models\Currency;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AddCurrency extends Component
{

    public $currentRoute , $key , $value;

    public function mount($id = null)
    {
        $this->currentRoute = Route::currentRouteName();
    }


    public function addNewCurreny()
    {
        $this->validate(
            [
                'key' => 'required|string|unique:currencies,key' ,
                'value' => 'required|string|unique:currencies,key',
            ]
            );
        Currency::create([
            'key' => $this->key,
            'value' => $this->value,
        ]);
        notify()->success('New Currency Added Succesfully');
        return redirect(route($this->currentRoute));
    }

    public function render()
    {
        return view('livewire.admin.views.settings.currency.add-currency')
        ->extends('layouts.admin.master')->section('content');

    }
}
