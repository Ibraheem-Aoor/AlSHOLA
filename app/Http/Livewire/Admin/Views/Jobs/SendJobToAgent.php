<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SendJobToAgent extends Component
{
    public $job , $nameFilter;
    public function mount($id)
    {
        $this->job = Job::findOrFail($id);
    }

      //This method send the job post to talent using many to many relationship
    public function sendJobToAgent($id)
    {
        $agent = User::findOrFail($id);
        if($agent->hasJob($this->job))
            {
                session()->flash('warning' , 'The Job is Already Sent to the Agent');
            }
        DB::table('job_user')->insert([
            'user_id' => $agent->id,
            'job_id' => $this->job->id,
        ]);
        session()->flash('success' , 'Job Has been Send Successfully');
    }



      //remove the job psot from the user by deleting the record in the pivot table.
    public function takeJobFromAgent($id)
    {
        $agent = User::findOrFail($id);
        if($agent->hasJob($this->job))
        {
            DB::table('job_user')->where([['job_id' , $this->job->id] , ['user_id' , $agent->id]])->delete();
        }
    }

    public function getUsers()
    {
        if($this->nameFilter)
            return User::where([
                            ['name' , 'LIKE' , '%'.$this->nameFilter.'%'] ,
                            ['type' , 'Agent'] ,
                    ])->with('country')->simplePaginate(15);
        return  User::where([
                ['type' , 'Agent'] ,
                ])->with('country')->simplePaginate(15);
    }

    public function render()
    {
        $users = $this->getUsers();
        return view('livewire.admin.views.jobs.send-job-to-agent'
        , [
            'users' => $users,
        ]
        )->extends('layouts.admin.master')->section('content');
    }
}
