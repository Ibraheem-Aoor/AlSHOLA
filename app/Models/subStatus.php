<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subStatus extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'main_status_id'];

    /**
     * Each Sub status belongs to 1 main status
     */

    public function mainStatus()
    {
        return $this->belongsTo(ApplicationMainStatus::class , 'main_status_id');
    }
}
