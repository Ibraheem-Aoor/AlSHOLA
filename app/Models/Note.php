<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'message' ,
        'job_id' ,
        'user_id',
    ];

    //The user represents the publisher of the note (The admin)
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }


    public function job()
    {
        return $this->belongsTo(Job::class , 'job_id');
    }

}
