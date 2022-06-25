<?php

namespace App\Http\Livewire\Admin\Views\History;

use App\Models\DemandHsitroyRecored;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DemandHistory extends Component
{
    public function render()
    {
        $histories = DemandHsitroyRecored::with('actor')->simplePaginate(15);
        return view('livewire.admin.views.history.demand-history' ,
        [
            'histories' => $histories
        ])->extends('layouts.admin.master')->section('content');
    }
}
