<?php

namespace App\Http\Livewire\Admin\Views\Broker;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class AllBrokers extends Component
{

    public function delete(Request $request)
    {
        User::whereId($request->id)?->delete();
        $request->get('id')  ?  notify()->success('Broker Deleted Successfully') : notify()->error('Something went wrong') ;
        return redirect()->back();
    }
    public function render()
    {
        $brokers = User::where('type' , 'Broker')->paginate(15);
        return view('livewire.admin.views.broker.all-brokers' ,
            [
                'brokers' => $brokers
                ]
            )->extends('layouts.admin.master')->section('content');
    }
}
