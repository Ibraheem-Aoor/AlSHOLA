<?php

namespace App\Http\Livewire\Admin\Views\Users\Profile;

use App\Models\User;
use Livewire\Component;

class ShowUserProfile extends Component
{
    public $user;
    public function mount($id)
    {
        $this->user = User::with(['title' , 'nationality' , 'country' , 'personalAttachments' , 'company'])->findOrFail($id);
    }
    public function render()
    {
        return view('livewire.admin.views.users.profile.show-user-profile')->extends('layouts.admin.master')->section('content');
    }
}
