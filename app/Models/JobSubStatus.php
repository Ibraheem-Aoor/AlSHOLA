<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSubStatus extends Model
{
    use HasFactory;
    protected $fillable = ['name' ,  'job_main_status_id'];

    public function mainStatus()
    {
        return $this->belongsTo(JobMainStatus::class , 'job_main_status_id');
    }
}
