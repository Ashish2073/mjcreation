<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Sendemailvarificationotp;
use Twilio\Rest\Client;
use App\Models\User;
use app\smsvarification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationControllers extends Controller
{

    public function register(Request $request){

        dd($request);

        $validator = Validator::make($request->all(), [
            'phone_number' => ['sometimes', 'string', 'max:255','unique:users'],
            'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required_without:email'],
            'email' => ['required_without:phone_number'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        User::create([

            'email' => $request->email??Null,
            'phone_no'=>$request->phone_no??Null,
            'password' => Hash::make($request->password),
        ]);
        if(isset($request->email)){
            $otp = rand(100000,999999);
            event(new Sendemailvarificationotp($otp,$request));



        }

         return redirect("/verification");

    }








    public function redirectTo()
    {
        return route('register');
    }






}
