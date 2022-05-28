<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationAttachment extends Model
{
    use HasFactory;

    /**
     * if the is_forwarded_employer  == true then the attachment will be shown to emoloyer.
     * if the is_forwarded_talent == true then the attachment will be shown to emoloyer.
     */
    protected $fillable = [
        'application_id' , 'user_id' , 'name' ,
        'type', 'is_forwarded_employer' , 'is_forwarded_talent' ,
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
