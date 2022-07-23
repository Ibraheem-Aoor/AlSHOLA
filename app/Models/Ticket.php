<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['application_id' , 'reason' , 'contact_number' , 'user_id' , 'status' , 'other_reason'];


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class , 'application_id');
    }

}


