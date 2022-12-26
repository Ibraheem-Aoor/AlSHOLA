<?php

namespace App\Http\Livewire\Admin\Views\Cases;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AllCases extends Component
{


    public function render()
    {
        $cases = Ticket::with(['application.job:id,post_number' , 'user'])->paginate(15);
        $user_layout = Auth::user()->type == 'Admin' ?  'layouts.admin.master' : 'layouts.coordinator.master';
        return view('livewire.admin.views.cases.all-cases' , ['cases' => $cases])
            ->extends($user_layout)->section('content');
    }
}
