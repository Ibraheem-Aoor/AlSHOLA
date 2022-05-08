<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;
    public $preventsLazyLoading = true;


    protected $fillable = [
        'recommended_user' , 'order_id'
    ];


    public function recommendedUser()
    {
        return $this->belongsTo(User::class , 'recommended_user');
    }

    public function order()
    {
        return $this->belongsTo(CandidacyOrder::class , 'order_id');
    }
}
