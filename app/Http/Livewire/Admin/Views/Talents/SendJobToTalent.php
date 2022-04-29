<?php

namespace App\Http\Livewire\Admin\Views\Talents;

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



    //This method send the job post to talent using many to many relationship
    public function snedJobToEmployer($id)
    {
        $employee = User::findOrFail($id);
        if($employee->hasJob($this->job))
            {
                session()->flash('warning' , 'The Job is Already Sent to the user');
            }
        DB::table('job_user')->insert([
            'user_id' => $employee->id,
            'job_id' => $this->job->id,
        ]);
        session()->flash('success' , 'Job Has been Send Successfully');
    }



    //remove the job psot from the user by deleting the record in the pivot table.
    public function takeJobFromTalent($id)
    {
        $employee = User::findOrFail($id);
        if($employee->hasJob($this->job))
        {
            DB::table('job_user')->where([['job_id' , $this->job->id] , ['user_id' , $employee->id]])->delete();
        }
    }


    public function render()
    {
        $talentedEmloyees = User::where('type' ,'Talented')->paginate(15);
        return view('livewire.admin.views.talents.send-job-to-talent' , [ 'employees' => $talentedEmloyees])->extends('layouts.admin.master')->section('content');;
    }
}
