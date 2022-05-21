<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /**
     * This mdoel represents the emplyer that will be filled in the agent represented form
     */
    use HasFactory;
    protected $fillable = [
        'name' , 'duration' , 'country_id' , 'designation' , 'application_id'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
