<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefusedApplications extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'application_id' , 'reason' ];

    public function application()
    {
        return $this->belongsTo(Application::class , 'application_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }


}
