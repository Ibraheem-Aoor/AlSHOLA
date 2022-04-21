<?php

namespace App\Http\Livewire\Admin\Views\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PasswordUpdate extends Component
{

    public $password , $password_confirmation;

    public function UpdatePassword()
    {
        $this->validate($this->rules());
        $user = User::findOrFail(Auth::id());
        $user->password = Hash::make($this->password);
        $user->save();
        notify()->success('Password Updated Successfully');
        return redirect(route('admin.dashboard'));
    }

    public function rules()
    {
        return [
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    public function render()
    {
        return view('livewire.admin.views.profile.password-update')->extends('layouts.admin.master')->section('content');
    }
}
