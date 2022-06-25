<?php

namespace App\Http\Livewire\Admin\Views\History;
use App\Models\ApplicationHsitroyRecored;

use Livewire\Component;

class ApplicationHistory extends Component
{
    public function render()
    {
        $histories = ApplicationHsitroyRecored::with('actor')->simplePaginate(15);
        return view('livewire.admin.views.history.application-history' , ['histories' => $histories])->extends('layouts.admin.master')->section('content');
    }
}
