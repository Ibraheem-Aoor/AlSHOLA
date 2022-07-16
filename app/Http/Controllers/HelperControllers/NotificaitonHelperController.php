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
        switch($notification->type)
        {
            case 'App\Notifications\NewContactNotification':
                if($notification->data['userType'] == 'Client')
                        return redirect(route('admin.contacts.employers'));
                elseif($notification->data['userType'] == 'Agent')
                    return redirect(route('admin.contacts.talents'));
                break;
            case 'App\Notifications\DemandCreated':
            case 'App\Notifications\DemandUpdated':
                return redirect(route('admin.demand.details' , $notification->data['demand_id']));
                case 'App\Notifications\ApplicationCreated':
                    return redirect(route('admin.application.details' , $notification->data['application_id']));
            case 'App\Notifications\NewDemandAttachment':
                return redirect(route('admin.demand.details' , $notification->data['demand_id']).'#custom-nav-attachments');
            case 'App\Notifications\NewApplicationAttachment':
                    return redirect(route('admin.application.details' , $notification->data['application_id']).'#custom-nav-attachments');


        }

        return redirect(route('admin.contacts.guests'));
    }




}
