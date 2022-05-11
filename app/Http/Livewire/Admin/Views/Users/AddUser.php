<?php

namespace App\Http\Livewire\Admin\Views\Users;

use App\Models\Nationality;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AddUser extends Component
{
    public $name , $email , $password ,
            $password_confirmation , $type ,  $roles = [],
            $mobile , $nationality , $companyName;


    public function addNewUser()
    {
        $this->validate($this->rules());
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'type' => $this->type,
            'natoinality_id' => $this->nationality,
            'company_name' => $this->companyName,
            'is_admin' => $this->type == 'admin' ? 1 : 0,
        ]);
        if($this->roles)
            $user->assignRole($this->roles);
        $user->natoinality_id = $this->nationality;
        $user->company_name = $this->companyName;
        $user->save();
        notify()->success('User Addedd Successfully');
        return redirect(route('admin.dashboard'));
    }


    public function rules()
    {
        return[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['sometimes'],
            'type' => [
                'required' ,
                'string' ,
                Rule::in(['Talented', 'Employer' , 'ALSHOLA' , 'personal'])
            ],
            'mobile' => 'required|numeric',
            'nationality' => 'required_without:companyName|nullable',
            'companyName' => 'required_without:nationality|nullable'
            ];
    }

    public function render()
    {
        $allRoles = Role::all();
        $nationalities = Nationality::all();
        $registerdComapnies = User::where('type' , 'Employer')->select('id' , 'name')->get(); //all registerd Comapnies
        return view('livewire.admin.views.users.add-user' , [
            'allRoles' => $allRoles ,
            'nationalities' => $nationalities,
            'registerdComapnies' => $registerdComapnies,
            ])->extends('layouts.admin.master')->section('content');
    }
}
