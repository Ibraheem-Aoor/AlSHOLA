<?php

namespace App\Http\Livewire\Admin\Views\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function PHPUnit\Framework\isEmpty;

class RoleEdit extends Component
{
    public $role , $name , $permissions=[]  , $newPermissions=[] , $allPermissinos = [];
    public function mount($id)
    {
        $this->role = Role::with('permissions')->findOrFail($id);
        $this->name = $this->role->name;
        $this->permissions = $this->role->permissions;
        $this->allPermissinos = Permission::all();
    }


    public function editRole()
    {
        $this->validate($this->rules());
        $this->role->revokePermissionTo($this->role->permissions);
        $this->role->syncPermissions($this->newPermissions);
        $this->role->save();
        notify()->success('Role Updated successfully');
        return redirect(route('admin.dashboard'));
    }


    public function rules()
    {
        return [
            'name' => 'required|string|unique:roles,name,'.$this->role->id,
            'newPermissions' => 'required',
        ];
    }


    public function render()
    {
        return view('livewire.admin.views.roles.role-edit')->extends('layouts.admin.master')->section('content');
    }
}
