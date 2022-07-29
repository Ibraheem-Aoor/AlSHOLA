<?php

namespace App\Http\Controllers\User\Employer\Cases;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewCaseRequest;
use App\Http\Traits\User\CaseTrait;
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
    use CaseTrait;

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
        $case = Ticket::with(['application.job:id,post_number' , 'attachments.user' , 'messages.user' ,
                            'application.attachments' , 'application.user' , 'application.title'])->findOrFail($id);
        return view('user.employer.cases.show' , compact('case'));
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




}
