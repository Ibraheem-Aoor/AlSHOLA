<?php
namespace App\Http\Helpers;

use App\Models\Application;
use Illuminate\Support\Facades\Request;
use App\Models\ApplicationMainStatus;
use App\Models\ApplicationStatusHistory;
use App\Models\subStatus;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

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
     */
    public function postChangeApplicationStatus(HttpRequest $request  , $id)
    {
        Validator::make($request->all() ,  ['mainStatus' => 'required' , 'subStatus' => 'required']);
        $application = Application::with(['subStatus' , 'mainStatus'])->findOrFail($id);
        $historyPrevStatus = $application->subStatus->name;
        $application->sub_status_id = $request->subStatus;
        $application->main_status_id = $request->mainStatus;
        $application->save();
        $historyNewStatus = subStatus::findOrFail($request->subStatus)->name;
        $this->makeHistoryRecord($historyPrevStatus , $historyNewStatus , $application->id);
        HistoryRecordHelper::registerApplicationLog('Application Status Changed' .'<a href="/admin/application/'.$application->id.'/details">'.'( '.$application->ref.' )'.'</a>');
        Artisan::call('cache:clear');
        notify()->success('application status changed Successfully');
        return redirect()->back();
    }


    public function makeHistoryRecord($prev  , $new , $id)
    {
        $history = new ApplicationStatusHistory();
        $history->prev_status = $prev;
        $history->status = $new;
        $history->application_id = $id;
        $history->user_id = Auth::id();
        $history->save();
    }


    /**
     * Admin Delete Application
     */
    public function deleteApplication(HttpFoundationRequest $request)
    {
            Application::findOrFail($request->id)->delete();
            notify()->success('Application Deleted Successfully');
            return back();
    }

}
