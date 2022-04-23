<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
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

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class , 'job_id');
    }

}
