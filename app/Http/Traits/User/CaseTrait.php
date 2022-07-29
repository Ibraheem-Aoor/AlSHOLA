<?php
namespace App\Http\Traits\User;

use App\Models\CaseAttachment;
use App\Models\CaseMessage;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

Trait CaseTrait
{
    public function sendMessage(Request $request , $id)
    {
        $validate = Validator::make($request->all() , ['message' => 'required']);
        if($validate->fails())
        {
            notify()->error('Something went wrong');
            return back();
        }
        $case = Ticket::findOrFail($id);
        CaseMessage::create(
            [
                'user_id' => Auth::id(),
                'ticket_id' => $id,
                'message' => $request->get('message'),
                'is_forwarded_employer' => Auth::user()->type == 'Client' ? 1 : 0,
                'is_forwarded_employee' =>  Auth::user()->type == 'Agent' ? 1 : 0,
            ]
            );
        notify()->success('Message Sended Successfully');
        return back();
    }//End sendMessage




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
                'is_forwarded_employer' => Auth::user()->type == 'Client' ? 1 : 0,
                'is_forwarded_employee' => Auth::user()->type == 'Agent' ? 1 : 0,
                'name' => $fileName,
            ]);
        }
    }//end uplaodCaseAttachments

}
