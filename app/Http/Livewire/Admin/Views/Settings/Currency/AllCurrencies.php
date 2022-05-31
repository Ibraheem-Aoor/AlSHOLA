<?php

namespace App\Http\Livewire\Admin\Views\Settings\Currency;

use App\Models\Currency;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Livewire\Component;

class AllCurrencies extends Component
{

    public $newCurrencyKey , $newCurrencyName;
    public  $targetCurrencyId , $currentRoute;
    public function mount($id = null)
    {
        $this->currentRoute = FacadesRoute::currentRouteName();
    }

    public function setCurrencyId($id)
    {
        $this->targetCurrencyId = $id;
    }

    public function editCurrency()
    {
        $currency = Currency::findOrFail($this->targetCurrencyId);
        $this->validate([
            'newCurrencyKey' => 'required|string|unique:currencies,key,'.$this->id,
            'newCurrencyName' => 'required|string|unique:currencies,value,'.$this->id,
        ]);

        $currency->key = $this->newCurrencyKey;
        $currency->value = $this->newCurrencyName;
        $currency->save();
        notify()->success('Currency Updated Successfully');
        return redirect(route($this->currentRoute));
    }

    public function deleteCurrency($id)
    {
        Currency::findOrFail($id)->delete();
        notify()->success('Currency Deleted Successfully');
        return redirect(route($this->currentRoute));
    }
    public function render()
    {
        $currencies = Currency::simplePaginate(15);
        return view('livewire.admin.views.settings.currency.all-currencies' ,
        [
            'currenccies' => $currencies,
        ])
        ->extends('layouts.admin.master')->section('content');
    }
}
