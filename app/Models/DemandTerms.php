<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DemandTerms extends Model
{
    use HasFactory;
    protected $fillable = [
                            'user_id' , 'title' ,
                            'serivce_charge' , 'per' , 'job_id' , 'currency' ,
                            'acceptence_duration' , 'submission_duration' , 'completion_duration', 'pay_from' , 'pay_to'
                        ];


    public function job()
    {
        return $this->belongsTo(Job::class ,  'job_id');
    }
}
