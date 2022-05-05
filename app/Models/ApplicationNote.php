<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationNote extends Model
{
    use HasFactory;

    public $preventsLazyLoading = true;



    protected $fillable = [
        'user_id'  , 'application_id'  , 'message'
    ];

    public function application()
    {
        return $this->belongsTo(Application::class , 'application_id');
    }

    public function user() //represnts the sender
    {
        return $this->belongsTo(User::class  , 'user_id');
    }
}
