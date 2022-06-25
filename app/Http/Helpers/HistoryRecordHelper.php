<?php
namespace App\Http\Helpers;

use App\Models\ApplicationHsitroyRecored;
use App\Models\DemandHsitroyRecored;
use Illuminate\Support\Facades\Auth;
use App\Models\AuthenticationHsitroyRecored;
use App\Models\UserManagementHsitroyRecored;

class HistoryRecordHelper
{
    /**
     * This Class is responsible to handle all history records functionalites
     * This class deals with diffrenet models (HistoryRecordModels)
     */

    public static function registerDemandLog($action)
    {
        $history = ['user_id' => Auth::id() , 'action' => $action];
        DemandHsitroyRecored::create($history);
    }//end method
    public static function registerApplicationLog($action)
    {
        $history = ['user_id' => Auth::id() , 'action' => $action];
        ApplicationHsitroyRecored::create($history);
    }//end method
    public static function registerAuthenticationLog($action)
    {
        $history = ['user_id' => Auth::id() , 'action' => $action];
        AuthenticationHsitroyRecored::create($history);
    }//end method
    public static function registerUserManagementLog($action)
    {
        $history = ['user_id' => Auth::id() , 'action' => $action];
        UserManagementHsitroyRecored::create($history);
    }//end method


}//End class
