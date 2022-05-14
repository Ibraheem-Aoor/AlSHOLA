<?php

namespace App\Http\Livewire\Admin\Views\Users;

use App\Models\Company;
use App\Models\Country;
use App\Models\Nationality;
use App\Models\Title;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNewClientOrAgent extends Component
{
    use WithFileUploads;
    /*
    * Agent/Client  Data
    */
    public $name ,  $email ,  $country , $registerationNo ,
            $resposebilePerson , $titlePosition,
            $mobile , $responseibleNationality , $type;

    public $currentRoute , $intendedUserType;
    /*
    * Agent/Client  Attachments
    */
    public  $profile , $license , $identity , $agreement;


    public function mount($id =  null)
    {
        $this->currentRoute = Route::currentRouteName();
       switch($this->currentRoute)
       {
           case 'agent.create':
            $this->type = "Agent";
            $this->intendedUserType = 'Agent';
             break;
           case 'client.create':
            $this->type = "Client";
            $this->intendedUserType = 'Client';
            break;
       }
    }


    public function addNewUser()
    {
        $this->validate($this->rules());
        $user = User::create(
            [
                'name' => $this->name,
                'type' => $this->type,
                'email' => $this->email,
                'password' => Hash::make('password'), //default password
                'country' => $this->country,
                'registration_No' => $this->registerationNo,
                'responsible_person' => $this->resposebilePerson,
                'title_position' => $this->titlePosition,
                'mobile' => $this->mobile,
                'nationality_id' => $this->responseibleNationality,
            ]
        );
        $this->uploadAttachments($user->id);
        notify()->success($this->intendedUserType.' Created Successfully');
        return redirect(route($this->currentRoute));
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'country' => 'required|string',
            'registerationNo' => 'required|string',
            'resposebilePerson' => 'required|string',
            'titlePosition' => 'required|string',
            'mobile' => 'required|numeric',
            'responseibleNationality' => 'required|string',
            'profile' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            'license' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            'identity' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            'agreement' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
        ];
    }

    public  function uploadAttachments($id)
    {
        $path = 'public/uploads/users/'.$id.'/attachments'.'/';
        $this->profile->storeAs($path.'profile/' , $this->profile->getClientOriginalName());
        $this->license->storeAs($path.'license/' , $this->license->getClientOriginalName());
        $this->identity->storeAs($path.'/id' , $this->identity->getClientOriginalName());
        $this->agreement->storeAs($path.'/agreement' , $this->agreement->getClientOriginalName());
        // $this->uploadAttachmentsToDB();
        /**
         * store these files in DB
         * make demand managment
         * make another section
         * deleiver the updated
         */
    }


    public function render()
    {
        $countries = Country::all();
        $titles = Title::all();
        $companies = Company::all();
        $nationalities = Nationality::all();
        return view('livewire.admin.views.users.add-new-client-or-agent' , [
            'countries' => $countries,
            'nationalities' => $nationalities,
            'titles' => $titles,
            'companies' => $companies,
        ])->extends('layouts.admin.master')->section('content');
    }
}
