<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidacyOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'number' , 'recommended_id' , 'job_id' , 'user_id'
    ];

    public function recommendedUser()
    {
        return $this->belongsTo(User::class , 'recommended_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class , 'application_id');
    }
}

