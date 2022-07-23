<?php

namespace App\Http\Livewire\Admin\Views\Cases;

use App\Models\Ticket;
use Livewire\Component;

class AllCases extends Component
{


    public function render()
    {
        $cases = Ticket::paginate(15);
        return view('livewire.admin.views.cases.all-cases' , ['cases' => $cases]);
    }
}
