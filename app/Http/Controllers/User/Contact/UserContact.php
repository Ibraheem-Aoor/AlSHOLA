<?php

namespace App\Http\Controllers\User\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\ContactFormRequest;
use App\Models\User;
use App\Models\UserCotnact;
use App\Notifications\NewContactNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserContact extends Controller
{
    /*
        * This class is respnsible to handle the contact form from the auth user.
    */

    public function index()
    {
        return view('user.contact.contact');
    }

    public function store(ContactFormRequest $request)
    {
        UserCotnact::create([
            'message' => $request->message ,
            'subject' => $request->subject,
            'user_type' => Auth::user()->type,
            'user_id' => Auth::id(),
        ]);
        $type = '';
        $data = [
            'name' => Auth::user()->name,
            'subject' => $request->subject,
            'email' => Auth::user()->email,
            'message' => $request->message,
            'userType' => Auth::user()->type,
        ];
        $users = User::where('is_admin' , '1')->get();
        foreach($users as $user)
            $user->notify( new NewContactNotification($data));
        switch(Auth::user()->type)
        {
            case 'Client' : $type = "employer"; break;
            case 'Agent' : $type = "talented"; break;
        }

        notify()->success('We will reach you soon!');
        return redirect($type.'/dashboard');
    }



}
