<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    public $preventsLazyLoading = true;


    protected $fillable = [
        'ref' , 'date' , 'title_id' , 'address' , 'full_name' , 'father_name' ,'passport_no' ,
        'contact_no' , 'place_of_birth' , 'date_of_birth' , 'age' , 'relegion' ,
        'place_issued' , 'date_issued' , 'expiry_issued' , 'sex' , 'children' ,
        'height' , 'weihgt' , 'arabic_speak' , 'arabic_understand' , 'arabic_read',
        'arabic_write' , 'english_speak' , 'english_understand' , 'english_read' , 'english_write',
        'hindi_speak' , 'hindi_understand' , 'hindi_read' , 'hindi_write', 'recommendations',
        'applicant_interviewd_by' , 'min_salary' , 'main_status_id' , 'sub_status_id' , 'forwarded',
        'user_id' , 'job_id' , 'employer_photo', 'third_language', 'nationality', 'is_accepted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id'); //Agent
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


    public function employers()
    {
        return $this->hasMany(Employer::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class , 'application_id');
    }

    public function visa()
    {
        return $this->hasOne(VisaInoformation::class , 'application_id');
    }

    public function statusHistory()
    {
        return $this->hasMany(ApplicationStatusHistory::class  , 'application_id');
    }

    public function mainStatus()
    {
        return $this->belongsTo(ApplicationMainStatus::class , 'main_status_id');
    }

    public function subStatus()
    {
        return $this->belongsTo(subStatus::class , 'sub_status_id');
    }

    public function title()
    {
        return $this->belongsTo(Title::class , 'title_id');
    }

    public function refused()
    {
        return $this->hasMany(RefusedApplications::class , 'application_id');
    }
    public function subInvoice()
    {
        return $this->hasMany(SubInvoice::class);
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class , 'nationality' , 'id');
    }
}
