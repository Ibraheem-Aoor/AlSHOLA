<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $fillable = ['job_id' , 'name' , 'user_id' , 'type'];

    public function job()
    {
        return $this->belongsTo(Job::class  ,'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');//represents the publisher
    }

    public function application()
    {
        return $this->belongsTo(Application::class , 'application_id');
    }

}
