<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'number' , 'job_id' , 'currency'];


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function subInvoices()
    {
        return $this->hasMany(SubInvoice::class);
    }
}
