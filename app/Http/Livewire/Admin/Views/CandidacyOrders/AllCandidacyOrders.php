<?php

namespace App\Http\Livewire\Admin\Views\CandidacyOrders;

use App\Models\CandidacyOrder;
use Livewire\Component;

class AllCandidacyOrders extends Component
{
    public function render()
    {
        $orders = CandidacyOrder::simplePaginate(15);
        return view('livewire.admin.views.candidacy-orders.all-candidacy-orders'
        ,   [
            'orders' => $orders
            ])->extends('layouts.admin.master')->section('content');
    }
}
