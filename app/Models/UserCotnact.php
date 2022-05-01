<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCotnact extends Model
{
    use HasFactory;

    public $preventsLazyLoading = true;

    protected $fillable = [
        'subject' , 'message' , 'user_id' , 'user_type'
    ];


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
