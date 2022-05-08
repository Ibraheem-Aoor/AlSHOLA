<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_id' , 'user_id' , 'name' , 'forwarded' , 'is_forwarded_employer' , 'is_forwarded_talent' ,
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
    public function application()
    {
        return $this->belongsTo(Application::class , 'application_id');
    }

}
