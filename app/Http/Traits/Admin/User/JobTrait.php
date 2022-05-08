<?php
namespace App\Http\Traits\Admin\User;

use App\Models\ApplicationNote;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


trait JobTrait
{
    /**
     * This Trait contaits the neccessary metohds for manpulting jobs
     */



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


}
