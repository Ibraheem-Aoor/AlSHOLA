<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubInvoice extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'quantity' , 'charge' , 'application_id' , 'invoice_id'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }


}
