<?php

namespace App\Http\Livewire\Admin\Views\Contacts;

use App\Models\Contact;
use Livewire\Component;

class GuestContacts extends Component
{
    public function render()
    {
        $contacts = Contact::simplePaginate(15);
        return view('livewire.admin.views.contacts.guest-contacts' , ['contacts' => $contacts])
        ->extends('layouts.admin.master')->section('content');
    }
}
