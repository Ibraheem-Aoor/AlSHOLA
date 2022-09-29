<?php

namespace App\Http\Livewire\Admin\Views\Users\Profile;

use App\Models\Company;
use App\Models\Country;
use App\Models\User;
use Livewire\Component;

class ShowUserProfile extends Component
{
    public $user , $intendedUSerType;

    public $name , $email , $country , $responsible_person , $company , $mobile;
    public function mount($id)
    {
        $this->user = User::with(['title' , 'nationality' , 'country' , 'personalAttachments' , 'company'])->findOrFail($id);
        $this->intendedUSerType = $this->user->type;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->mobile = $this->user->mobile;
        $this->country = $this->user->country->id;
        $this->responsible_person = $this->user->responsible_person;
        $this->company = $this->user?->company?->id;
    }

    public function updateProfile()
    {
        $this->validate($this->rules());
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->mobile = $this->mobile;
        $this->user->responsible_person = $this->responsible_person;
        $this->user->company_id = $this->company;
        $this->user->country_id = $this->country;
        $this->user->save();
        notify()->success('Profile Updated Successfully');
        return redirect(route('admin.user.profile.show' , $this->user->id));
    }

    public function rules()
    {
        return[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'mobile' => 'nullable|numeric',
            'responsible_person' => 'nullable|string',
            'company' => 'nullable',
            'country' => 'nullable',
        ];
    }


    public function render()
    {
        $countries = Country::all();
        $companies = Company::all();
        return view('livewire.admin.views.users.profile.show-user-profile' , ['countries' => $countries , 'companies' => $companies])
                    ->extends('layouts.admin.master')->section('content');
    }
}
