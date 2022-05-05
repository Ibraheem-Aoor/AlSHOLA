<?php
namespace App\Http\Traits\Admin\User;

use App\Models\User;

trait ApplicationTrait
{
    /*
        This trait contains the admin application-managment functions.
    */

      //download application file
      public function downloadCv($name)
      {
          return redirect(route('cv.download',[ 'jobId' => $this->job->id ,  'fileName' => $name]));
      }



}
