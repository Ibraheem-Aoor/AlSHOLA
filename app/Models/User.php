<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'is_admin',
        'title_id',
        'responsible_person',
        'country_id',
        'nationality_id',
        'mobile',
        'registration_No',
        'company_id',
        'total_required_sales',
        'total_achived',
        'commission_rate',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class , 'job_user');
    }

    // check if the current user have the given job in jobs collection (M to M realtion ship)
    public function hasJob($job)
    {
        return $this->jobs->contains($job);
    }



    public function attachments()
    {
        return $this->hasMany(Attachment::class , 'user_id');
    }

    public function notes()
    {
        return $this->HasManyThrough(Note::class , Job::class);
    }



    public function applications()
    {
        return $this->hasMany(Application::class , 'user_id');
    }


    /*
     * Check if the user have the given jobId in his applications.,
     */

    public function hasAppliedToJob($jobId)
    {
        return $this->applications->contains('job_id' , $jobId)  ? true : false;
    }


    public function candidacyOrders()
    {
        return $this->hasMany(CandidacyOrder::class , 'user_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    /**
     * Each User has many personal attachments like agreement and etc..
     * each attachment type can be recognized from it's 'folder' attribute
     */
    public function personalAttachments()
    {
        return $this->hasMany(UserAttachment::class , 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class , 'company_id');
    }


    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }


    public function brokerJobs()
    {
        return $this->hasMany(Job::class , 'broker_id');
    }

    public function brokerSalesGoal()
    {
        return $this->hasOne(IncomeGoal::class , 'broker_id');
    }


    public function clientJobs()
    {
        return $this->hasMany(Job::class , 'user_id');
    }
}
