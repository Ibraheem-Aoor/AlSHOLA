<?php

namespace App\Http\Controllers\HelperControllers;

use App\Http\Controllers\Controller;
use App\Notifications\NewContactNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class NotificaitonHelperController extends Controller
{
    public function markNotification($id)
    {
        $notification = Auth::user()->unReadNotifications->where('id' , $id)->first();
        $notification->markAsRead();
        if($notification->data['userType'] == 'Client')
            return redirect(route('admin.contacts.employers'));
        elseif($notification->data['userType'] == 'Agent')
            return redirect(route('admin.contacts.talents'));

        return redirect(route('admin.contacts.guests'));
    }
}
