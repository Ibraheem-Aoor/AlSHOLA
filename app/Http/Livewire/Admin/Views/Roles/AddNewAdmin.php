<?php

namespace App\Http\Livewire\Admin\Views\Roles;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AddNewAdmin extends Component
{

    public $name , $email , $password ,
    $password_confirmation ,
    $mobile  , $roles = [];


    public function addNewAdmin()
    {
        $this->validate($this->rules());
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'type' => 'Admin',
            'password' => Hash::make($this->password),
            'mobile' => $this->mobile,
            'is_admin' => true,
            ''
        ]);
        $user->assignRole($this->roles);
        notify()->success('Admin Addedd Successfully');
        return redirect(route('admin.dashboard'));
    }


    public function rules()
    {
        return[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => 'nullable',
            'mobile' => 'required|numeric',
            ];
    }
    public function render()
    {
        $allRoles = Role::all();
        return view('livewire.admin.views.roles.add-new-admin' , ['allRoles' => $allRoles])->extends('layouts.admin.master')->section('content');
    }
}
