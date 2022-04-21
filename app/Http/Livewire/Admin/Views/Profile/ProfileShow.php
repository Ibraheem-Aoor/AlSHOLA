<?php

namespace App\Http\Livewire\Admin\Views\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ProfileShow extends Component
{
    use WithFileUploads;
    public $name , $email , $avatar;
    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email =$user->email;

    }

    public function saveProfile()
    {
        $this->validate($this->rules());
        $user = User::findOrFail(Auth::id());
        $user->name = $this->name;
        $user->email = $this->email;
        $user->avatar = $this->avatar ?  $this->getAvatarPath() : Auth::user()->avatar;
        $user->save();
        notify()->success('Profile Updated Successfully');
        return redirect(route('admin.dashboard'));
    }

    public function rules()
    {
        return[
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,id,'.Auth::id(),
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png',
        ];
    }

    public function getAvatarPath()
    {
        if($this->avatar)
        {
            $avatrName = time().'.'. $this->avatar->extension();
            $path = 'uploads/avatars/users/'.Auth::id().'/';
            Storage::disk('public')->putFileAs($path , $this->avatar  ,$avatrName);
            $this->removeOldAvatar();
            return $avatrName;
        }

    }

    public function removeOldAvatar()
    {
        if(Auth::user()->avatar != 'user.png')
        {
            Storage::disk('public')->delete('uploads/avatars/users/'.Auth::id().'/'.Auth::user()->avatar);
        }
    }
    public function render()
    {
        return view('livewire.admin.views.profile.profile-show')->extends('layouts.admin.master')->section('content');;
    }
}
