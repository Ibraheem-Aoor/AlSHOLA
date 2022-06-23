<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobMainStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function subStatuses()
    {
        return $this->hasMany(subStatus::class , 'job_main_status_id');
    }

}
