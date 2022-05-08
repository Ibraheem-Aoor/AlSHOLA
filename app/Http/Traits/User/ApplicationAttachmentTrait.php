<?php
namespace App\Http\Traits\User;

use App\Models\Application;
use App\Models\ApplicationAttachment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

trait  ApplicationAttachmentTrait
{
    //Upload application medical files.
    public function uploadApplicationAttachment(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'file' => 'required|mimes:jpg,jpeg,png,svg,pdf|max:10024',
        ]);
        if($validate->fails())
        {
            notify()->error('No File Detected');
            return redirect()->back();
        }

        if($request->has('id') && $request->hasFile('file'))
        {
            $application = Application::with('job:id')->findOrFail($request->id);
            $file = $request->file('file');
            $fileName  = $file->getClientOriginalName();
            $path = 'public/uploads/applications/jobs/'.$application->job->id.'/'.Auth::id().'/attachments'.'/';
            $file->storeAs($path , $fileName);
            ApplicationAttachment::create(
                [
                    'name' => $fileName,
                    'user_id' => Auth::id(),
                    'application_id' => $request->id,
                ]
            );
            if(Route::currentRouteName() == 'application.file.upload')
            {
                return redirect()->back();
            }
            // notify()->success('File Uploaded Successfully');
            // return redirect()->back();
        }

    }//end method
}
