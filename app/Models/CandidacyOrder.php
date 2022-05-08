<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidacyOrder extends Model
{
    use HasFactory;
    public $preventsLazyLoading = true;

    protected $fillable = [
        'number', 'job_id' , 'user_id'
    ];

    public function user()//The talent who made the request.
    {
        return $this->belongsTo(User::class , 'user_id');
    }


    public function job()
    {
        return $this->belongsTo(Job::class , 'job_id');
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class , 'order_id');
    }
}

