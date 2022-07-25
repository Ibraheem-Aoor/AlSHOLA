<?php

namespace App\Http\Controllers\Admin\Cases;

use App\Http\Controllers\Controller;
use App\Models\CaseAttachment;
use App\Models\Ticket;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
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
}
