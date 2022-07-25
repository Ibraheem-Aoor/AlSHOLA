<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'name' , 'ticket_id' , 'is_forwarded_employer' , 'is_forwarded_employee'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }//end user

    public function ticktet()
    {
        return $this->belongsTo(Ticket::class , 'ticket_id');
    }
}
