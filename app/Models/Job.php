<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    use HasFactory;
    public $preventsLazyLoading = true;
    protected $fillable = [
        'post_number',
        'title_id',
        'natoinality_id',
        'salary',
        'quantity',
        'contract_period',
        'working_hours',
        'status',
        'working_days',
        'accommodation',
        'transport',
        'medical',
        'insurance',
        'food',
        'food_amount',
        'accommodation_amount',
        'annual_leave',
        'air_ticket',
        'off_day',
        'indemnity_leave_and_overtime_salary',
        'covid_test',
        'other_terms',
        'age',
        'sex',
        'requested_by',
        'gender_prefrences',
        'age_limit',
        'joining_ticket',
        'return_ticket',
        'currency',
        'user_id',
        'description',
        'sub_status_id' ,
        'main_status_id',
        'broker_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class , 'job_user');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id'); //represnts the publisher Only
    }

    public function subJobs()
    {
        return $this->hasMany(SubJob::class , 'job_id' , 'id');
    }

    public function qty()
    {
        $total = 0;
        foreach($this->subJobs as $subJob)
            $total += $subJob->quantity;
        return $total;
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class , 'job_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class , 'job_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class  , 'job_id' , 'id');
    }

    public function title()
    {
        return $this->belongsTo(Title::class , 'title_id' , 'id');
    }


    public function nationality()
    {
        return $this->belongsTo(Nationality::class , 'natoinality_id' , 'id');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class , 'currency_id' , 'id');
    }

    public function refuseTimes()
    {
        return $this->hasMany(RefusedJob::class , 'job_id');
    }


    public function terms()
    {
        return $this->hasMany(DemandTerms::class , 'job_id');
    }


    public function mainStatus()
    {
        return $this->belongsTo(JobMainStatus::class,  'main_status_id');
    }

    public function subStatus()
    {
        return $this->belongsTo(JobSubStatus::class,  'sub_status_id');
    }


    public function tickets()
    {
        return $this->hasManyThrough(Ticket::class , Application::class);
    }

    public function broker()
    {
        return $this->belongsTo(User::class , 'broker_id');
    }


    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

}
