<?php

namespace App\Http\Controllers\User\Employer\Cases;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewCaseRequest;
use App\Models\Application;
use App\Models\CaseAttachment;
use App\Models\Job;
use App\Models\subStatus;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Mockery\Undefined;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = Ticket::whereUserId(Auth::id())
                ->with(['application.job'])
                ->simplePaginate(15);
        return view('user.employer.cases.index' , compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobIds = Job::whereBelongsTo(Auth::user())->pluck('id');
        $applications = Application::whereIn('job_id' , $jobIds)
                        ->where('forwarded' , true)
                        ->whereHas('subStatus' , function($subStatus)
                        {
                            $subStatus->where('name' , 'Arrived');
                        })->get();
        return view('user.employer.cases.create' , compact('applications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewCaseRequest $request)
    {
        $ticket = Ticket::create(array_merge($request->all() , ['user_id' => Auth::id() , 'status' => 'Case Submitted'] ));
        if($request->has('attachments'))
        {
            $this->uplaodCaseAttachments($request->attachments , $ticket->id);
        }
        notify()->success('Case Sended Successfully');
        return redirect(route('employer.dashboard'));
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $attachment = CaseAttachment::findOrFail($request->id);
        Storage::delete('public/uploads/cases/'.$id.'/'.$attachment->name);
        $attachment->delete();
    }


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
                'is_forwarded_employer' => true,
                'is_forwarded_employee' => false,
                'name' => $fileName,
            ]);
        }
    }//end uplaodCaseAttachments

}
