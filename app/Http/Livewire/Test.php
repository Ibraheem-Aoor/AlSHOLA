<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{

    public $title = "Test", $input;

    public function save()
    {
        return dd($this->input);
    }
    public function render()
    {
        return view('livewire.test')->extends('layouts.user.employer.master')->section('content');;

    }
}
