<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    public $preventsLazyLoading = true;


    protected $fillable = [
        'cover_letter' , 'resume' , 'user_id', 'job_id' , 'forwarded'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id'); //Talent
    }

    public function job()
    {
        return $this->belongsTo(Job::class , 'job_id');
    }

    public function notes()
    {
        return $this->hasMany(ApplicationNote::class , 'application_id');
    }

    public function attachments()
    {
        return $this->hasMany(ApplicationAttachment::class , 'application_id');
    }//end method

    public function visa()
    {
        return $this->hasOne(VisaInoformation::class , 'application_id');
    }
}
