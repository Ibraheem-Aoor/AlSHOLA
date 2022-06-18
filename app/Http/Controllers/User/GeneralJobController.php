<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\User\JobAttachmentTrait;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneralJobController extends Controller
{
    use JobAttachmentTrait;

    public function uploadJobAttachment(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'attachments.*' => 'required|mimes:jpg,jpeg,png,svg,pdf|max:10024',
        ]);
        if($validate->fails())
            return redirect()->back()->with(['error' , 'no file detected']);
        if($request->has('id') && $request->hasFile('attachments'))
        {
            $job = Job::findOrFail($request->id);
            $this->addAttachementsToJob($request->attachments  , $job->id , '');
            notify()->success('File Uploaded Successfully');
            return redirect()->back();
        }
            notify()->error('No File Detected');
            return redirect()->back();
    }//end method

}
