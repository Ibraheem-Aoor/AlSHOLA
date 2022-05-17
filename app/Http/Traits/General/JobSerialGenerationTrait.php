<?php
namespace App\Http\Traits\General;

use App\Models\Job;

trait JobSerialGenerationTrait
{
    /**
     * This trait contains the function respnseible for generating unqiue Serial Nubmers for Job models
     */

    function generatePosteNumber() {
        $number = date('y').mt_rand(10000000, 99999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->postNumberExists($number)) {
            return $this->generatePosteNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    function postNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Job::where('post_number' , $number)->exists();
    }
}
