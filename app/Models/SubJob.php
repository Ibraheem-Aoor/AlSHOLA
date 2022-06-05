<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_id' , 'nationality_id' , 'quantity' , 'salary' , 'job_id'
    ];


    public function job()
    {
        return $this->belongsTo(Job::class , 'job_id' , 'id');
    }

    public function title()
    {
        return $this->belongsTo(Title::class , 'title_id' , 'id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class , 'natoinality_id' , 'id');
    }

}
