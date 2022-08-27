<?php

namespace App\Http\Controllers\HelperControllers;

use App\Http\Controllers\Controller;
use App\Mail\UserMail;
use App\Models\Job;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminMailController extends Controller
{
    public function sendMail(Request $request)
    {
        $is_valid = Validator::make($request->all(), [
            'user_id' => 'required',
            'subject' => 'required',
            'message' => 'required',
//            'attachments.*' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024'
        ]);
        if ($is_valid->fails()) {
            return $this->backWithoutError();
        }
        try {
            $data = $request->toArray();
            dd($request->file('attachments'));
            dd($data);
            $user = User::findOrFail($data['user_id']);
            Mail::to($user)->send(new UserMail($data));
        } catch (\Throwable $exception) {
            return $this->backWithoutError();
        }
    }


    public function backWithoutError()
    {
        notify()->error('Something Went Wrong');
        return back();
    }
}
