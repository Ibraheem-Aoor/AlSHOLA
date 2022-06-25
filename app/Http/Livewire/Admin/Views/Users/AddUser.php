<?php

namespace App\Http\Livewire\Admin\Views\Users;

use App\Http\Helpers\HistoryRecordHelper;
use App\Models\Company;
use App\Models\Country;
use App\Models\Nationality;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AddUser extends Component
{
    public $name , $email , $password ,
            $password_confirmation , $type ,
            $mobile , $nationality , $company , $country;

    public function addNewUser()
    {
        $this->validate($this->rules());
        $user = User::create([
            'registration_No' => $this->type[0].' - '.$this->generateRegisterationNo(), //the first letter of his type with the new number
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'type' => $this->type,
            'natoinality_id' => $this->nationality,
            'company_id' => $this->company,
            'country_id' => $this->country,
            'mobile' => $this->mobile,
        ]);
        HistoryRecordHelper::registerUserManagementLog("$this->type Created" . '<a href="/admin/profile/'.$user->id.'">'.'( '.$user->registration_No.' )'.'</a>');
        notify()->success('User Addedd Successfully');
        return redirect(route('admin.dashboard'));
    }


    public function rules()
    {
        return[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->id],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'roles' => ['sometimes'],
            'type' => [
                'required' ,
                'string' ,
                Rule::in(['Agent', 'Client' , 'Broker' , 'Personal'])
            ],
            'mobile' => 'required|numeric',
            'nationality' => 'required',
            'company' => 'required',
            'country' => 'required',
            ];
    }



    //Generating a registeration Number for the new
    function generateRegisterationNo() {
        $number = date('y').mt_rand(1000000, 9999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->registerationNoExists($number)) {
            return $this->generateRegisterationNo();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    function registerationNoExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return User::where('registration_No' , $number)->exists();
    }

    public function render()
    {
        $nationalities = Nationality::all();
        $registerdComapnies = User::where('type' , 'Employer')->select('id' , 'name')->get(); //all registerd Comapnies
        $countries = Country::all();
        $companies = Company::all();
        return view('livewire.admin.views.users.add-user' , [
            // 'allRoles' => $allRoles ,
            'nationalities' => $nationalities,
            'registerdComapnies' => $registerdComapnies,
            'countries' => $countries,
            'companies' => $companies,
            ])->extends('layouts.admin.master')->section('content');
    }
}
