<?php

namespace App\Http\Livewire\Admin\Views\Jobs;

use App\Models\Currency;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SendJobToAgent extends Component
{
    public $job , $nameFilter;
    public function mount($id)
    {
        $this->job = Job::with(['subJobs.title' , 'user:id,name'])->findOrFail($id);
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
        $currencies = Currency::all();
        $user_layout = Auth::user()->type == 'Admin' ?  'layouts.admin.master' : 'layouts.coordinator.master';
        return view('livewire.admin.views.jobs.send-job-to-agent'
        , [
            'users' => $users,
            'currencies' => $currencies,
        ]
        )->extends($user_layout)->section('content');
    }
}
