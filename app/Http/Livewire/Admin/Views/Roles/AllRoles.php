<?php

namespace App\Http\Livewire\Admin\Views\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AllRoles extends Component
{
    public function render()
    {
        $roles = Role::with('permissions')->simplePaginate(15);
        return view('livewire.admin.views.roles.all-roles' , ['roles' => $roles])
        ->extends('layouts.admin.master')->section('content');
    }
}
