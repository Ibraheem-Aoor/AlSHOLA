<?php
namespace App\Http\Helpers;

use App\Models\Application;
use Illuminate\Support\Facades\Request;
use App\Models\ApplicationMainStatus;
use App\Models\subStatus;

class ApplicationHelper
{
    /**
     * This helper is used to hanlde some operations on applications.
     */


    /**
     * Return the sub-statuses of the selected main statuses.
     */
    public function getSubStatuses($id)
    {
        return subStatus::where('main_status_id' , $id)->get();
    }


    /**
     * Change the applciation status
     * ajax: post
     */
    public function postChangeApplicationStatus(Request $request , $id)
    {
        $application =  Application::findorFail($id);
        $application->main_status_id = $request->mainStatus;
        $application->sub_status_id = $request->subStatus;
    }
}
