<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public $preventsLazyLoading = true;

    use HasFactory;
    protected $fillabe = [
        'name' , 'sector_id',
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class , 'sector_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class , 'title_id');
    }


}
