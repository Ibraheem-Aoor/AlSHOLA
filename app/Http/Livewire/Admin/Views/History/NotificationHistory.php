<?php

namespace App\Http\Livewire\Admin\Views\History;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
// use Illuminate\Notifications\Notification;

class NotificationHistory extends Component
{

    public function render()
    {
        $data['notifications'] = DB::table('notifications')->paginate(15);
        // dd($data['notifications']);
        return view('livewire.admin.views.history.notification-history'  , $data)->extends('layouts.admin.master')->section('content');
    }
}
