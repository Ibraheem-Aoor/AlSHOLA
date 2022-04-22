<?php

namespace App\Http\Livewire\User\Employer\Views\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
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
        return redirect(route('employer.dashboard'));
    }

    public function rules()
    {
        return[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png',
        ];
    }

    // store the avatar if uploaded file and return the name
    // if it's not uploaded then the default name will be "user.png"
    // if there is an uploaded avatar the old one will be removed.
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
        return view('livewire.user.employer.views.profile.profile-show')->extends('layouts.user.employer.master')->section('content');
    }
}
