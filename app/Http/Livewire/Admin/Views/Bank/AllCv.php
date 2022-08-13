<?php

namespace App\Http\Livewire\Admin\Views\Bank;

use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\ApplicationMainStatus;
use App\Models\subStatus;

class AllCv extends Component
{
    public $mainStatusFilter , $subStatusFilter , $search , $mainStatuses , $subStatuses;


    public function mount()
    {
        $this->mainStatuses = ApplicationMainStatus::all();
        $this->subStatuses = subStatus::all();
    }

    public function getApplciations()
    {
        $applications = Application::query()->where('user_id' , Auth::user())->with(['attachments' , 'notes' , 'subStatus' , 'title' ,'job.subStatus']);
        if($this->mainStatusFilter)
            $applications->where('main_status_id' , $this->mainStatusFilter);

        if($this->subStatusFilter)
            $applications->where('sub_status_id' , $this->subStatusFilter);

        if($this->search){
            $applications->where('ref' , 'like' , '%'.$this->search.'%')
            ->orWhere('date' , 'like' , '%'.$this->search.'%')
            ->orWhere('address' , 'like' , '%'.$this->search.'%')
            ->orWhere('full_name' , 'like' , '%'.$this->search.'%')
            ->orWhere('father_name' , 'like' , '%'.$this->search.'%')
            ->orWhere('passport_no' , 'like' , '%'.$this->search.'%')
            ->orWhere('contact_no' , 'like' , '%'.$this->search.'%')
            ->orWhere('place_of_birth' , 'like' , '%'.$this->search.'%')
            ->orWhere('date_of_birth' , 'like' , '%'.$this->search.'%')
            ->orWhere('age' , 'like' , '%'.$this->search.'%')
            ->orWhere('relegion' , 'like' , '%'.$this->search.'%')
            ->orWhere('place_issued' , 'like' , '%'.$this->search.'%')
            ->orWhere('date_issued' , 'like' , '%'.$this->search.'%')
            ->orWhere('expiry_issued' , 'like' , '%'.$this->search.'%')
            ->orWhere('sex' , 'like' , '%'.$this->search.'%')
            ->orWhere('age' , 'like' , '%'.$this->search.'%')
            ->orWhere('children' , 'like' , '%'.$this->search.'%')
            ->orWhere('height' , 'like' , '%'.$this->search.'%')
            ->orWhere('weihgt' , 'like' , '%'.$this->search.'%')
            ->orWhere('nationality' , 'like' , '%'.$this->search.'%')
            ->orWhere('arabic_speak' , 'like' , '%'.$this->search.'%')
            ->orWhere('arabic_understand' , 'like' , '%'.$this->search.'%')
            ->orWhere('arabic_read' , 'like' , '%'.$this->search.'%')
            ->orWhere('arabic_write' , 'like' , '%'.$this->search.'%')
            ->orWhere('english_speak' , 'like' , '%'.$this->search.'%')
            ->orWhere('english_understand' , 'like' , '%'.$this->search.'%')
            ->orWhere('english_read' , 'like' , '%'.$this->search.'%')
            ->orWhere('english_write' , 'like' , '%'.$this->search.'%')
            ->orWhere('third_language' , 'like' , '%'.$this->search.'%')
            ->orWhere('hindi_understand' , 'like' , '%'.$this->search.'%')
            ->orWhere('hindi_read' , 'like' , '%'.$this->search.'%')
            ->orWhere('hindi_write' , 'like' , '%'.$this->search.'%')
            ->orWhere('visa_number' , 'like' , '%'.$this->search.'%')
            ->orWhere('flight_ticket' , 'like' , '%'.$this->search.'%')
            ->orWhere('recommendations' , 'like' , '%'.$this->search.'%')
            ->orWhere('applicant_interviewd_by' , 'like' , '%'.$this->search.'%')
            ->orWhere('min_salary' , 'like' , '%'.$this->search.'%')
            ->orWhereHas('job' , function($job){
                $job->where('post_number' ,  'like' , '%'.$this->search.'%');
            })
            ->orWhereHas('title' , function($title){
                $title->where('name'  , 'like' , '%'.$this->search.'%');
            });
        }//End if
        return  $applications->where('user_id' , Auth::id())->paginate(15);
    }//End getApplciations


    public function render()
    {
        $applications = $this->getApplciations();
        return view('livewire.admin.views.bank.all-cv' , ['applications' => $applications])->extends('layouts.admin.master')->section('content');
    }
}
