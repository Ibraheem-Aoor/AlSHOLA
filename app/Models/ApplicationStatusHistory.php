<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatusHistory extends Model
{
    use HasFactory;
    protected $fillable = ['status' , 'application_id' , 'user_id' , 'prev_status'];

    /**
     * Each Appliction has many history records.
     * Each usert can change many applications status
     */

    public function application()
    {
        return $this->belongsTo(Application::class , 'application_id');
    }//end application method.


    /**
     * the user reprensts the admin who made the chanage
     */
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }//end user method.



}
