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


    public function qty()
    {
        $total = 0;
        foreach($this->subInvoices as $subInvoice)
            $total += $subInvoice->quantity;
        return $total;
    }
    
    public function totalCharge()
    {
        $total = 0;
        foreach($this->subInvoices as $subInvoice)
            $total += $subInvoice->charge;
        return $total;
    }
}
