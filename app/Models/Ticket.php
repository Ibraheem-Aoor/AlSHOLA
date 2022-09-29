<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['application_id' , 'reason' , 'contact_number' , 'user_id' , 'status' , 'other_reason' , 'details'];


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class , 'application_id');
    }

    public function attachments()
    {
        return $this->hasMany(CaseAttachment::class , 'ticket_id');
    }

    public function messages()
    {
        return $this->hasMany(CaseMessage::class , 'ticket_id');
    }

}


