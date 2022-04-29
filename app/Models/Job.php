<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public $preventsLazyLoading = true;
    protected $fillable = [
        'title',
        'description',
        'requirements',
        'responsibilities',
        'location',
        'employer_website',
        'salary',
        'status',
        'vacancy',
        'end_date',
        'nature',
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

}
