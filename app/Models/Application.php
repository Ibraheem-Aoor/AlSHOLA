<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    public $preventsLazyLoading = true;


    protected $fillable = [
        'ref' , 'date' , 'title_id' , 'address' , 'full_name' , 'passport_no' ,
        'contact_no' , 'place_of_birth' , 'date_of_birth' , 'age' , 'relegion' ,
        'place_issued' , 'date_issued' , 'expiry_issued' , 'sex' , 'children' ,
        'height' , 'weihgt' , 'arabic_speak' , 'arabic_understand' , 'arabic_read',
        'arabic_write' , 'english_speak' , 'english_understand' , 'english_read' , 'english_write',
        'hindi_speak' , 'hindi_understand' , 'hindi_read' , 'hindi_write', 'recommendations',
        'applicant_interviewd_by' , 'min_salary' , 'signature' , 'status' , 'forwarded',
        'user_id' , 'job_id'
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


    public function emplyoers()
    {
        return $this->hasMany(Employer::class);
    }

    public function visa()
    {
        return $this->hasOne(VisaInoformation::class , 'application_id');
    }
}
