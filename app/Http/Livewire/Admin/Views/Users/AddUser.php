<?php

namespace App\Http\Livewire\Admin\Views\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AddUser extends Component
{
    public $name , $email , $password , $password_confirmation , $type ,  $roles = [];

    public function addNewUser()
    {
        $this->validate($this->rules());
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'type' => $this->type,
            'is_admin' => $this->type == 'admin' ? 1 : 0,
        ]);
        $user->assignRole($this->roles);
        $user->save();
        notify()->success('User Addedd Successfully');
        return redirect(route('admin.dashboard'));
    }


    public function rules()
    {
        return[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['sometimes'],
            'type' => [
                'required' ,
                'string' ,
                Rule::in(['Talented', 'Employer' , 'admin'])
                ]
            ];
    }

    public function render()
    {
        $allRoles = Role::all();
        return view('livewire.admin.views.users.add-user' , ['allRoles' => $allRoles])->extends('layouts.admin.master')->section('content');
    }
}
