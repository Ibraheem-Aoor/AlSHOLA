<?php

namespace App\Http\Livewire\Admin\Views\Users;

use App\Http\Traits\Admin\User\GeneralUserTrait;
use App\Models\Company;
use App\Models\User;
use Livewire\Component;

class AllUsers extends Component
{
    use GeneralUserTrait;

    /**
     * intendedUsersType for filtering the users
     */

    public $intendedUsersType , $orderBy='id';

    /**
     * get the intended users according to filters
     * @return \App\Models\User
     */
    public function getUsers()
    {
        switch($this->intendedUsersType)
        {
            case Null: return  User::With('company')->orderBy($this->orderBy)->simplePaginate(15);
            default :  return  User::with('company')->where('type' , $this->intendedUsersType)->orderBy($this->orderBy)->simplePaginate(15);
        }
    }
    public function render()
    {
        $users = $this->getUsers();
        $companies = Company::all();
        return view('livewire.admin.views.users.all-users' , [
            'users' => $users,
            'companies' => $companies
            ])
            ->extends('layouts.admin.master')->section('content');
    }
}
