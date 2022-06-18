<?php
namespace App\Http\Helpers;

use App\Models\Application;
use App\Models\ApplicationMainStatus;
use App\Models\ApplicationStatusHistory;
use App\Models\DemandTerms;
use App\Models\Job;
use App\Models\subStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class DemandHelper
{
    /**
     * This helper is used to hanlde some operations on Demands.
     */



    public function setDemandTermsAndSendToAgent(Request $request , $id)
    {
        $job = Job::with('terms')->findOrFail($id);
        $validate = Validator::make($request->all() , ['demandTerms.*' => 'required']);
        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors());
        }
        if(count($job->terms) > 0)
            $this->deleteOldTerms($job);
        $this->saveJobTerms($request , $job);
        $this->sendJobToAgent($request->agent , $job);
        notify()->success('Demand Sended Successfully');
        return redirect()->back();
    }//end method


    public function deleteOldTerms($job)
    {
        $job->terms()->delete();
    }

    public function saveJobTerms($request , $job)
    {
        foreach($request->demandTerms as $term)
        {
            DemandTerms::create([
                'user_id' => $request->agent,
                'job_id' => $job->id,
                'currency' => $request->currency,
                'title' => $term['title'],
                'serivce_charge' => $term['service_charge'],
                'per' => $term['per'],
            ]);
        }
    }//end method


        //This method send the job post to talent using many to many relationship
    public function sendJobToAgent($agentId , $job)
    {
        $agent = User::findOrFail($agentId);
        if($agent->hasJob($job))
            {
                session()->flash('warning' , 'The Job is Already Sent to the Agent');
            }
        DB::table('job_user')->insert([
            'user_id' => $agent->id,
            'job_id' => $job->id,
        ]);
    }//end method

}//end class
