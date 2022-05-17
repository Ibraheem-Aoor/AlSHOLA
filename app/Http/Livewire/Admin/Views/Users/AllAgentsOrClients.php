<?php

namespace App\Http\Livewire\Admin\Views\Users;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class AllAgentsOrClients extends Component
{
    /**
     * This Class is to show the agent/client list
     * Agent Managment List
     * Client Managmnet List
     */
    public $currentRoute , $intendedUserType;
    public $nameFilter;
    public function mount($id =  null)
    {
        $this->currentRoute = Route::currentRouteName();
        switch($this->currentRoute)
        {
            case 'agent.list':
                $this->intendedUserType = 'Agent';
                break;

            case 'client.list':
                $this->intendedUserType = 'Client';
                break;
        }
    }

    /**
     * Filtering Names
     */

    public function getUsers()
    {
        if($this->nameFilter)
            return User::where([
                            ['name' , 'LIKE' , '%'.$this->nameFilter.'%'] ,
                            ['type' , $this->intendedUserType] ,
                    ])->with('country')->simplePaginate(15);
        return  User::where([
                ['type' , $this->intendedUserType] ,
                ])->with('country')->simplePaginate(15);
    }

    public function render()
    {
        $users = $this->getUsers();
        return view('livewire.admin.views.users.all-agents-or-clients' ,
    [
        'users' => $users,
    ])->extends('layouts.admin.master')->section('content');
    }
}
