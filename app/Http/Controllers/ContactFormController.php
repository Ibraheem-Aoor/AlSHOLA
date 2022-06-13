<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\NewContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        Contact::create($request->all());
        notify()->success('We will reach you Soon!');
        $data = [
            'name' => $request->name,
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message,
            'userType' => 'Guest',
        ];
        $users = User::where('is_admin' , '1')->get();
        foreach($users as $user)
        $user->notify( new NewContactNotification($data));
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
