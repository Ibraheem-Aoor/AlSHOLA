<?php

namespace App\Http\Livewire\Admin\Views\Contacts;

use App\Models\UserCotnact;
use Livewire\Component;

class TalentContacts extends Component
{


    public function deleteContact($id)
    {
        UserCotnact::findOrFail($id)->delete();
        notify()->success('Deleted Successfully');
        return redirect(route('admin.contacts.talents'));
    }
    public function render()
    {
        $contacts = UserCotnact::with('user')->where('user_type' , 'Agent')->simplePaginate(15);
        return view('livewire.admin.views.contacts.talent-contacts' , [
            'contacts' => $contacts
        ])->extends('layouts.admin.master')->section('content');;
    }
}
