<?php

namespace App\Http\Livewire\Admin\Views\Bank;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Livewire\Component;

class CvApply extends Component
{

    public $application;
    /**
     * Some Attributes to filtet appeard jobs
     */

    public $jobStatusFilter;
    public function mount($id)
    {
        $this->application = Application::findOrFail($id);
    }


    public function apply($id)
    {
        $this->application->job_id = $id;
        $this->application->forwarded = true;
        $this->application->save();
    }

    public function cancel()
    {
        $this->application->job_id = null;
        $this->application->forwarded = false;
        $this->application->save();
    }


    public function getJobsByStatus()
    {
        if($this->jobStatusFilter)
            return Job::with(['user' , 'subStatus'])
                    ->withCount('applications')
                    ->where([
                            ['status' , 'like' , '%'.$this->jobStatusFilter.'%'] ,
                    ])->orderByDesc('created_at')->simplePaginate(15);
        return  Job::with(['user' , 'subStatus'])
                    ->withCount('applications')
                    ->orderByDesc('created_at')->simplePaginate(15);
    }

    public function render()
    {
        $jobs = $this->getJobsByStatus();
        return view('livewire.admin.views.bank.cv-apply' ,
        [
            'application' => $this->application,
            'jobs' => $jobs,
        ])
        ->extends('layouts.admin.master')->section('content');
    }
}
