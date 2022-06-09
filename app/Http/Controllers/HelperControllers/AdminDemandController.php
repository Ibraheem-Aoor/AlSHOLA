<?php

namespace App\Http\Controllers\HelperControllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminDemandController extends Controller
{
    /**
     * Admin Layer: change the given demand status
     */
    public function changeDemandStatus(Request $request , $id)
    {
        $request->validate(['status' => 'required']);
        $job = Job::findOrFail($id);
        $job->status = $request->status;
        $job->save();
        notify()->success('Demand Status Changed Successfully');
        return redirect()->back();
    }//end method

    
}
