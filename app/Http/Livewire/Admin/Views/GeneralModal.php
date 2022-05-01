<?php

namespace App\Http\Livewire\Admin\Views;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class GeneralModal extends ModalComponent
{

    protected $listeners = ['testEvent'];


    public function render()
    {
        return view('livewire.admin.views.general-modal');
    }
}
