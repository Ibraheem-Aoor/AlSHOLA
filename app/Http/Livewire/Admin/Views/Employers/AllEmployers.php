<?php

namespace App\Http\Livewire\Admin\Views\Employers;

use App\Http\Traits\Admin\User\GeneralUserTrait;
use App\Models\User;
use Livewire\Component;

class AllEmployers extends Component
{
    use GeneralUserTrait;
    public function render()
    {
        $allEmployers = User::where('type' , 'Employer')->paginate(15);
        return view('livewire.admin.views.employers.all-employers' ,
        ['allEmployers' => $allEmployers])->extends('layouts.admin.master')->section('content');
    }
}
