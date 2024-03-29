<?php

namespace App\Http\Controllers\Admin\Cases;

use App\Http\Controllers\Controller;
use App\Models\CaseAttachment;
use App\Models\Ticket;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class CaseController extends Controller
{
    public function destroy(Request $request , $id)
    {
        $attachment = CaseAttachment::findOrFail($request->id);
        Storage::delete('public/uploads/cases/'.$id.'/'.$attachment->name);
        $attachment->delete();
        return redirect(route('admin.case.details' , $id).'#custom-nav-attachments');
    }//End destroy




    public function changeStatus(Request $request , $id)
    {
        $validate  = FacadesValidator::make ($request->all() , ['status' => 'required']);
        if($validate->fails())
        {
            notify()->error('Something Went Wrong');
            return redirect()->back();
        }
        $case = Ticket::findOrFail($id);
        $case->status = $request->status;
        $case->save();
        notify()->success('Status Changed Successfully');
        return redirect()->back();
    }//end message


     /**
     * Attach more Files (admin - client -agnet)
     */

    public function attachMoreFiles(Request $request , $id)
    {
        $request->validate(['attachments.*' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024']);
        if(!$request->has('attachments'))
        {
            notify()->error('Something Went Wrong');
            return redirect()->back();
        }
        $this->uplaodCaseAttachments($request->attachments , $id);
        notify()->success('Files Uploaded Successfully');
        return redirect()->back();
    }//end  attachMoreFiles



    /**
     * Upload The Attachment of the case (storage  + db)
     */
    public function uplaodCaseAttachments($attachments , $caseId)
    {
        foreach($attachments as $file)
        {
            $path = 'public/uploads/cases/'.$caseId.'/';
            $fileName = $file->getClientOriginalName();
            $file->storeAs($path , $fileName);
            CaseAttachment::create([
                'ticket_id' => $caseId,
                'user_id' => Auth::id(),
                'is_forwarded_employer' => 1,
                'is_forwarded_employee' => 0,
                'name' => $fileName,
            ]);
        }
    }//end uplaodCaseAttachments
}
