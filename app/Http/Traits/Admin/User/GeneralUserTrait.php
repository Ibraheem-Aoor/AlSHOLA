<?php
namespace App\Http\Traits\Admin\User;

use App\Models\User;

trait GeneralUserTrait
{
    /*
        This trait contains the admin users-mangement functions.
    */

    
    /**
     * Block The given user
     */
    public function blockUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'blocked';
        $user->save();
        notify()->success('User Blocked Successfully');
        return redirect()->back();
    }


    /**
     * Active The Given User
     */
    public function activeUser($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();
        notify()->success('User Activated Successfully');
        return redirect()->back();
    }


}
