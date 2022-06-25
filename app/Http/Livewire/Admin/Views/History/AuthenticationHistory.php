<?php

namespace App\Http\Livewire\Admin\Views\History;

use App\Models\AuthenticationHsitroyRecored;
use Livewire\Component;

class AuthenticationHistory extends Component
{
    public function render()
    {
        $histories = AuthenticationHsitroyRecored::with('actor')->simplePaginate(15);
        return view('livewire.admin.views.history.authentication-history' , ['histories' => $histories])->extends('layouts.admin.master')->section('content');
    }
}
