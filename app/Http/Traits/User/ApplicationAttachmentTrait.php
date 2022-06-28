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
    /**
     * Upload attachment single file
     * the request have the id of the application with attribute "id"
     * this method will find the id and upload the file to the speceified path then creating the table record for it.
     */
    public function uploadApplicationAttachment(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'files.*' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            'file_type' => 'required|string',
            'visa_number' => 'nullable|string',
            'flight_ticket' => 'nullable|string',
        ]);
        if($validate->fails())
        {
            notify()->error($validate->errors()->first());
            return redirect()->back();
        }

        if($request->has('id') && $request->hasFile('files'))
        {
            $application = Application::with('job:id')->findOrFail($request->id);
            $files = $request->file('files');
            foreach($files as $file)
            {
                $fileName  = $file->getClientOriginalName();
                $path = 'public/uploads/applications/'.$application->id.'/'.'attachments'.'/';
                $file->storeAs($path , $fileName);
                $attachment  = ApplicationAttachment::create(
                    [
                        'name' => $fileName,
                        'user_id' => Auth::id(),
                        'application_id' => $application->id,
                        'is_forwarded_talent' => Auth::user()->type == 'Agent' ? true : false,
                        'is_forwarded_employer' => Auth::user()->type == 'Agent' ? false : true,
                        'type' => $request->file_type,
                        'visa_number' => $request->visa_number
                    ]
                );
        }
        $application->visa_number = $request->vlsa_number;
        $application->flight_ticket = $request->flight_ticket;
        $application->save();

            notify()->success('File Uploaded Successfully');
            return redirect()->back();
        }//end if
        notify()->error('Something went wrong');
        return redirect()->back();

    }//end method
}
