<?php

namespace App\Http\Livewire\Admin\Views\History;

use App\Models\UserManagementHsitroyRecored;
use Livewire\Component;

class UserManagementHistory extends Component
{
    public function render()
    {
        $histories = UserManagementHsitroyRecored::with('actor')->simplePaginate(15);

        return view('livewire.admin.views.history.user-management-history' , ['histories' => $histories])->extends('layouts.admin.master')->section('content');
    }
}
