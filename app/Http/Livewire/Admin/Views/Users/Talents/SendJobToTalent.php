<?php

namespace App\Http\Livewire\Admin\Views\Users\Talents;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SendJobToTalent extends Component
{

    /*
        * This class is respsnosible for sending a job to a talent/s.
    */

    public $job;

    public function mount($id = null)
    {
        $this->job = Job::findOrFail($id);
    }





    public function render()
    {
        $talentedEmloyees = User::where('type' ,'Talented')->paginate(15);
        return view('livewire.admin.views.users.talents.send-job-to-talent' , [ 'employees' => $talentedEmloyees])->extends('layouts.admin.master')->section('content');;
    }
}
