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

    public function render()
    {
        $users = User::where('type' , $this->intendedUserType)->with('country')->simplePaginate(15);
        return view('livewire.admin.views.users.all-agents-or-clients' ,
    [
        'users' => $users,
    ])->extends('layouts.admin.master')->section('content');
    }
}
