<?php

namespace App\Http\Livewire\Admin\Views\Histroy;

use App\Models\DemandHsitroyRecored;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DemandHistory extends Component
{
    public function render()
    {
        $histories = DemandHsitroyRecored::with('actor')->simplePaginate(15);
        return view('livewire.admin.views.histroy.demand-history' ,
        [
            'histories' => $histories
        ])->extends('layouts.admin.master')->section('content');
    }
}
