<?php

namespace App\Http\Livewire\Admin\Views\Demands;

use App\Http\Traits\General\JobSerialGenerationTrait;
use App\Models\Currency;
use App\Models\Job;
use App\Models\Nationality;
use App\Models\Sector;
use App\Models\Title;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Livewire\Component;

class NewRequestJob extends Component
{
    use JobSerialGenerationTrait;
    /**
     * This Component is to create a new job which is request by a company
     * So it will appear in the dashboard of that company
     */

    public $category , $title , $nationality , $currentStatus , $age , $salary,
            $sex , $client , $requestBy , $descreption , $currentRoute , $currency;

    public function mount()
    {
        $this->currentRoute = Route::currentRouteName();
    }
    public function createNewDemand()
    {

        $this->validate($this->rules());
        $job = Job::create(
            [
                'post_number' => $this->generatePosteNumber(),
                'title_id' => $this->title,
                'natoinality_id' => $this->nationality,
                'status' => $this->currentStatus,
                'age' => $this->age,
                'salary' => $this->salary,
                'sex' => $this->sex,
                'user_id' => $this->client,
                'requested_by' => $this->requestBy,
                'description' => $this->descreption,
                'currency'=> $this->currency,
            ]
        );
        notify()->success('New Demand Created Successfully');
        return redirect(route($this->currentRoute));
    }

    public function rules()
    {
        return [
            'category' => 'required',
            'title' => 'required',
            'nationality' => 'required',
            'currentStatus' => 'required|'.Rule::in(['completed' , 'active' , 'cancelled' , 'pending']),
            'age' => 'required',
            'salary' => 'required',
            'sex' => 'required',
            'client' => 'required',
            'requestBy' => 'required',
            'descreption' => 'required',
            'currency' => 'required',

        ];
    }

    public function render()
    {
        $clients = User::where('type' , 'Client')->get()->chunk(100 , function(){});
        $categoires = Sector::all();
        $titles = [];
        $currencies = Currency::all();
        if($this->category)
            $titles = Title::where('sector_id' , $this->category)->get();
        $nationalities = Nationality::all();
        return view('livewire.admin.views.demands.new-request-job' , [
            'clients' => $clients,
            'categoires' => $categoires,
            'titles' => $titles,
            'nationalities' => $nationalities,
            'currencies' => $currencies,
        ]
        )->extends('layouts.admin.master')->section('content');
    }
}
