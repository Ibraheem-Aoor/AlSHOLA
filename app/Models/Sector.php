<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    public $preventsLazyLoading = true;

    protected $fillable = [
        'name'
    ];


    /**
     * Each sector has m titles
     * Each tile has many jobs
     * Each sector has m jobs through titles.
     */

    public function titles()
    {
        return $this->hasMany(Title::class , 'sector_id');
    }
    public function jobs()
    {
        return $this->hasManyThrough(Job::class , Title::class);
    }
}
