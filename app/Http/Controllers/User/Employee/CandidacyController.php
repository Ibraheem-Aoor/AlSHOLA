<?php

namespace App\Http\Controllers\User\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Employee\Candidacy\CreateCandidacyOrderRequest;
use App\Models\CandidacyOrder;
use App\Models\Recommendation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidacyController extends Controller
{
    /*
        This Controller is responseble for candidate and recommendation orders.
    */

    public function index($jobId)
    {
        $users = User::where([['type' , 'Talented'] , ['status' , 'active']])->simplePaginate(15);
        return view('livewire.user.employee.views.candidacy-orders.candidates' , compact('users' , 'jobId'));
    }//end method


    // make the order and it's recommendations
    public function makeOrder(CreateCandidacyOrderRequest $request , $jobId)
    {
        $order = CandidacyOrder::create(
            [
                'number' => $this->generateOrderNumber(),
                'job_id' =>   $jobId,
                'user_id' => Auth::id(),
            ]
        );
        foreach($request->users as $user)
        {
            Recommendation::create([
                'recommended_user' => $user,
                'order_id' => $order->id,
            ]);
        }
        notify()->success('Thank You For Recommendations');
        return redirect(route('employee.dashboard'));
    }//end method



    function generateOrderNumber() {
        $number = date('y').mt_rand(1000000, 9999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->orderNumberExists($number)) {
            return $this->generateOrderNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    function orderNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return CandidacyOrder::where('number' , $number)->exists();
    }
}
