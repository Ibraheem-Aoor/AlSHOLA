<?php

namespace App\Http\Livewire\Admin\Views\Users;

use App\Http\Traits\Admin\User\GeneralUserTrait;
use App\Models\User;
use Livewire\Component;

class AllUsers extends Component
{
    use GeneralUserTrait;
    public function render()
    {
        $users = User::With(['roles' , 'company' , 'nationality'])->simplePaginate(15);
        return view('livewire.admin.views.users.all-users' , ['users' => $users])->extends('layouts.admin.master')->section('content');
    }
}
