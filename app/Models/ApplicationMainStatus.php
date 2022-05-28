<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationMainStatus extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'selected_id'];

    /**
     * Each main status has many substatuses.
     */

    public function subStatus()
    {
        return $this->hasMany(subStatus::class ,  'main_status_id');
    }

}
