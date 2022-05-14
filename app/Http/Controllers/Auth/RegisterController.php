<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Country;
use App\Models\Nationality;
use App\Models\Title;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'registration_No' => $data['type'][0].' - '.$this->generateRegisterationNo(), //the first letter of his type with the new number
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => 'active',
            'password' => Hash::make($data['password']),
            'type' => $data['type'],
            'country_id' => $data['country'],
            'nationality_id' => $data['responsible_nationality'],
            'mobile' => $data['mobile'],
            'title_id' => $data['title_position'],
            'company_id' => $data['company'],
            'responsible_person' => $data['responsible_person'],
        ]);
    }


    //Generating a registeration Number for the new
    function generateRegisterationNo() {
        $number = date('y').mt_rand(1000000, 9999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->registerationNoExists($number)) {
            return $this->generateRegisterationNo();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    function registerationNoExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return User::where('registration_No' , $number)->exists();
    }





    /*
        @override
    */
    public function showRegistrationForm()
    {
        $countries = Country::all();
        $nationalities = Nationality::all();
        $titles = Title::all();
        $companies = Company::all();
        return view('auth.register' , compact('countries' , 'nationalities' , 'titles' , 'companies') );
    }

    /*
        @override
    */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'type' => [
                'required' ,
                'string' ,
                Rule::in(['Agent', 'Client' , 'Broker'])
                ] ,
            'country' => ['required', 'string', 'max:255'],
            'responsible_nationality' =>  ['required', 'string', 'max:255'],
            'responsible_person' =>  ['required', 'string', 'max:255'],
            'title_position' =>  ['required', 'string', 'max:255'],
            'company' => 'required',
            'mobile' => "required|numeric",
        ]);
    }

    /*
        @Override
    */
    public function redirectTo()
    {
        if(Auth::user()->type == 'Client')
            return 'employer/dashboard';
        elseif(Auth::user()->type == 'Agent')
            return 'talented/dashboard';
    }
}
