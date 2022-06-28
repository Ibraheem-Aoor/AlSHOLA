<?php
namespace App\Http\Traits\User;

use App\Models\Attachment;
use Illuminate\Support\Facades\Auth;

trait JobAttachmentTrait
{
    /*
        This trait contains the neccessary method for job's attchments.
    */


      // Storing mutilple attachments with there original names
    public function addAttachementsToJob($attachments , $jobId  , $type)
    {
        foreach($attachments as $attachment)
        {
            $fileName  = $attachment->getClientOriginalName();
            $path = 'public/uploads/attachments/jobs/'.$jobId.'/';
            $attachment->storeAs($path , $fileName);
            Attachment::create([
                'name' => $fileName ,
                'job_id' => $jobId,
                'user_id' => Auth::id(), //The publisher
                'type' => $type == null  ? 'Extra File' : $type,
            ]);
        }
    }//end method
}
