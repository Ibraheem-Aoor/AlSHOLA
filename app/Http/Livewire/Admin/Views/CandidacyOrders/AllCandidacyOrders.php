<?php

namespace App\Http\Livewire\Admin\Views\CandidacyOrders;

use App\Models\CandidacyOrder;
use Livewire\Component;

class AllCandidacyOrders extends Component
{
    public function render()
    {
        $orders = CandidacyOrder::with(['job:id,title,post_number' , 'user:id,name'])->withCount('recommendations')->simplePaginate(15);
        return view('livewire.admin.views.candidacy-orders.all-candidacy-orders'
        ,   [
            'orders' => $orders
            ])->extends('layouts.admin.master')->section('content');
    }
}
