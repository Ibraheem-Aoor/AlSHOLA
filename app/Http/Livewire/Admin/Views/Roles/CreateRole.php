<?php

namespace App\Http\Livewire\Admin\Views\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $name , $permissions=[];


    //Add New Role with the selected permessions.
    public function addRole()
    {
        $this->validate($this->rules());
        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->permissions);
        notify()->success('Role Added successfully');
        return redirect(route('admin.dashboard'));

    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:roles',
            'permissions' => 'required',
        ];
    }

    public function render()
    {
        $allPermssions = Permission::all();
        return view('livewire.admin.views.roles.create-role'
            , ['allPermissions' => $allPermssions]
        )->extends('layouts.admin.master')->section('content');
    }
}
