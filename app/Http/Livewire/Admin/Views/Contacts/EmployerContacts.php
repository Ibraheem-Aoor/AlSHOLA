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


    public function deleteContact($id)
    {
        UserCotnact::findOrFail($id)->delete();
        notify()->success('Deleted Successfully');
        return redirect(route('admin.contacts.employers'));
    }
    public function render()
    {
        $contacts = UserCotnact::with('user')->where('user_type' , 'Client')->simplePaginate(15);
        return view('livewire.admin.views.contacts.employer-contacts' , [
            'contacts' => $contacts
        ])->extends('layouts.admin.master')->section('content');;
    }
}
