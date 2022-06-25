<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\HistoryRecordHelper;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule as ValidationRule;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Override
    public function redirectTo()
    {
        HistoryRecordHelper::registerAuthenticationLog(Auth::user()->name.' has Logged In');
        if(Auth::user()->type == 'Client')
            return 'employer/dashboard';
        elseif(Auth::user()->type == 'Agent')
            return 'talented/dashboard';
        elseif(Auth::user()->type == 'admin' && Auth::user()->is_admin)
            return 'admin/dashboard';
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        return Arr::add($credentials, 'status', 'active');
    }//end


}
