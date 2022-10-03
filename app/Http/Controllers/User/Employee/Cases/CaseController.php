<?php

namespace App\Http\Controllers\User\Employee\Cases;

use App\Http\Controllers\Controller;
use App\Http\Traits\User\CaseTrait;
use App\Models\Application;
use App\Models\CaseMessage;
use App\Models\Ticket;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class CaseController extends Controller
{
    use CaseTrait;

    public function index()
    {
        $applicationIds = Application::where('user_id' , Auth::id())->pluck('id'); //brings all auth agent application id's
        $cases = Ticket::whereIn('application_id'  , $applicationIds) //brings all the tickets realted to the auth agent
                ->with(['application' => function($application){
                    $application->with(['job.broker' , 'attachments' , 'user'  , 'title' , 'subStatus' , 'employers' , 'educations']);
                } , 'attachments.user' , 'messages.user' ])
                ->simplePaginate(15);
        return view('user.employee.cases.index' , compact('cases'));
    }//End Index


    public function showCase($id)
    {
        $case = Ticket::with(['application.job:id,post_number' , 'attachments.user' , 'messages.user',
        'application.attachments' , 'application.user' , 'application.title'])->findOrFail($id);;
        return view('user.employee.cases.show' , compact('case'));
    }//End showCase



}
