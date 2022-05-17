<?php

namespace App\Http\Livewire\Admin\Views\Demands;

use App\Models\Job;
use App\Models\Nationality;
use App\Models\Sector;
use App\Models\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Http\Traits\General\JobSerialGenerationTrait;

class NewDemand extends Component
{

    /**
     * Create New Demand for AL-Shloa company => Employer is Al-Shloa Company
     *
     */

    use JobSerialGenerationTrait;

    public $currentRoute;

    /**
     * Demand data
     */

        public $category , $title , $nationality , $quantity , $salary ,
            $contactPeriod , $workingPerHours , $workingPerDays , $offDay,
            $accommodation , $transport , $medical , $insurance , $food , $annualLeave,
            $airTicket , $overTimeSalary , $covid_19 , $otherTerms , $descreption;



    public function createNewDemand()
    {
        $this->validate($this->rules());
        Job::Create([
            'post_number' => $this->generatePosteNumber(),
            'title_id' => $this->title,
            'natoinality_id' => $this->nationality,
            'salary' => $this->salary,
            'quantity' => $this->quantity,
            'description' => $this->descreption,
            'other_terms' => $this->otherTerms,
            'covid_test' => $this->covid_19,
            'indemnity_leave_and_overtime_salary' => $this->overTimeSalary,
            'air_ticket' => $this->airTicket,
            'annual_leave' => $this->annualLeave,
            'food' => $this->food,
            'insurance' => $this->insurance,
            'medical' => $this->medical,
            'transport' => $this->transport,
            'accommodation' => $this->accommodation,
            'off_day' => $this->offDay,
            'working_days' => $this->workingPerDays,
            'working_hours' => $this->workingPerHours,
            'contract_period' => $this->contactPeriod,
            'user_id' => Auth::id(),
        ]);
        notify()->success('Demand Created Successfully');
        return redirect(route($this->currentRoute));
    }

    public function rules()
    {
        return [
            'category' => 'required|string' ,
            'title' => 'required|string' ,
            'nationality' => 'required|string' ,
            'quantity' => 'required|numeric' ,
            'salary' => 'required|  numeric' ,
            'contactPeriod' => 'required' ,
            'workingPerHours' => 'required' ,
            'workingPerDays' => 'required' ,
            'offDay' => 'required' ,
            'accommodation' => 'required',
            'transport' => 'required',
            'medical' => 'required',
            'insurance' => 'required',
            'food' => 'required',
            'annualLeave' => 'required',
            'airTicket' => 'required',
            'overTimeSalary' => 'required',
            'covid_19' => 'required',
            'otherTerms' => 'required',
            'descreption' => 'required',
        ];
    }






    public function render()
    {
        $categoires = Sector::all();
        $titles = [];
        if($this->category)
            $titles = Title::where('sector_id' , $this->category)->get();
        $nationalities = Nationality::all();
        return view('livewire.admin.views.demands.new-demand' , [
            'categoires' => $categoires ,
            'titles' => $titles ,
            'nationalities' => $nationalities,
        ])->extends('layouts.admin.master')->section('content');
    }
}
