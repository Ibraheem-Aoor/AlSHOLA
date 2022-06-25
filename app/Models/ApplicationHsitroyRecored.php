<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationHsitroyRecored extends Model
{
    use HasFactory;
    protected $fillable = ['action' , 'user_id'];

    public function actor()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
