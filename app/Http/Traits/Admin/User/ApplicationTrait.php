<?php
namespace App\Http\Traits\Admin\User;

use App\Models\ApplicationNote;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

trait ApplicationTrait
{
    /*
        This trait contains the admin application-managment functions.
    */

    //download application file
    public function downloadCv($name , $jobId , $userId)
    {
        return redirect(route('cv.download',[ 'jobId' => $jobId ,  'fileName' => $name , 'userId' => $userId]));
    }


      public function setCurrentApplicationId($id)
    {
        $this->applicationId = $id;
    }


      //Send note without refuse
    public function sendNoteToAppliedTalent()
    {
        $this->validate(['note' => 'required' , 'applicationId' => 'required']);
        ApplicationNote::create([
            'user_id' => Auth::id(),
            'application_id' => $this->applicationId,
            'message' => $this->note,
            'seen' => true,
        ]);
        notify()->success('Note Sended Successfully');
        return redirect(route($this->currentRouteName));
    }//end method


}
