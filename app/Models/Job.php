<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public $preventsLazyLoading = true;
    protected $fillable = [
        'post_number',
        'title_id',
        'natoinality_id',
        'description',
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
    ];

    public function users()
    {
        return $this->belongsToMany(User::class , 'job_user');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id'); //represnts the publisher Only
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

}
