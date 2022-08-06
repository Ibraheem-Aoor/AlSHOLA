<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeGoal extends Model
{
    use HasFactory;
    protected $fillable = ['jan' , 'feb' , 'mar' , 'apr' , 'may' , 'jun' , 'jul' , 'aug' , 'sep' , 'oct' , 'nov' ,'dec' , 'broker_id'];

    public function broker()
    {
        return $this->belongsTo(User::class , 'broker_id');
    }
}


