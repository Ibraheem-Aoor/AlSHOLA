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
        'brief',
        'cv',
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

    public function company()
    {
        return $this->belongsTo(User::class , 'company_name');
    }
}
