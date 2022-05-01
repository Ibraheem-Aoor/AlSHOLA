<?php

namespace App\Http\Livewire\Admin\Views\Contacts;

use App\Http\Traits\Admin\Contacts\AuthUserContactFormTrait;
use App\Http\Traits\Admin\User\GeneralUserTrait;
use App\Models\UserCotnact;
use Livewire\Component;

class EmployerContacts extends Component
{
    use GeneralUserTrait;

    public $recoredId;
    public function render()
    {
        $contacts = UserCotnact::with('user')->where('user_type' , 'Employer')->simplePaginate(15);
        return view('livewire.admin.views.contacts.employer-contacts' , [
            'contacts' => $contacts
        ])->extends('layouts.admin.master')->section('content');;
    }
}
