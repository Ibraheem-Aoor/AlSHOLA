<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.profile.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateProfileRequest $request)
    {
        // $validate = Validator::make($request->all()  , [
        //     'brief' => 'required|string',
        //     'cv' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
        // ]);
        // if($validate->fails())
        // {
        //     return dd($validate->errors());
        //     return redirect()->back()->withErrors($validate);
        // }
        $user = User::findOrfail(Auth::id());
        $user->brief = $request->get('brief');
        if($request->hasFile('cv'))
        {
            if(($cv = Auth::user()->cv) != null)
                Storage::delete('public/uploads/users/cv/'.Auth::id().'/'.$cv);
            $fileName = $request->file('cv')->getClientOriginalName();
            $path = 'public/uploads/users/cv/'.Auth::id().'/';
            $request->file('cv')->storeAs($path , $fileName);
            $user->cv = $fileName;
        }
        $user->save();
        notify()->success('Profile Updated successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
