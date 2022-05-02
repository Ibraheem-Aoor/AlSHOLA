<?php

namespace App\Http\Livewire\Admin\Views\Users\Talents;

use App\Http\Traits\Admin\User\GeneralUserTrait;
use App\Models\User;
use Livewire\Component;

class AllTalents extends Component
{

    use GeneralUserTrait;
    public function render()
    {
        $allTalents = User::where('type' , 'Talented')->paginate(15);
        return view('livewire.admin.views.users.talents.all-talents'  , ['allTalents' => $allTalents])->extends('layouts.admin.master')->section('content');
    }
}
