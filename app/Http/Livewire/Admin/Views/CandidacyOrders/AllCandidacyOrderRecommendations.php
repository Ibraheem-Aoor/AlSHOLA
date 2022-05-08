<?php

namespace App\Http\Livewire\Admin\Views\CandidacyOrders;

use App\Http\Traits\Admin\User\JobTrait;
use App\Models\CandidacyOrder;
use Livewire\Component;

class AllCandidacyOrderRecommendations extends Component
{
    use JobTrait;

    public $orderId  , $job;
    public function mount($id)
    {
        $this->orderId = $id;
        $order = CandidacyOrder::with('job:id')->findOrFail($id);
        $this->job = $order->job;
    }
    public function render()
    {
        $order = CandidacyOrder::with(['recommendations.recommendedUser:id,name,email' , 'job:id,title,post_number'])->findOrFail($this->orderId);
        $recommendations = $order->recommendations()->simplePaginate(15);
        return view('livewire.admin.views.candidacy-orders.all-candidacy-order-recommendations'
            ,
                [
                    'order' => $order,
                    'recommendations' => $recommendations,
                ]
        )->extends('layouts.admin.master')->section('content');
    }
}
