<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaInoformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'visa_number' , 'visa_expire_date' ,
        'ticket' , 'arrival_date' , 'application_id',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class , 'application_id');
    }
}
