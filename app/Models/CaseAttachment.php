<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'name' , 'ticket_id' , 'is_forwarded_employer' , 'is_forwarded_employee'];
}
