<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Events\Sendemailvarificationotp;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function usersloginview(){
        return view('users.registration');
    }

    public function usersauthlogin(Request $request){


        mergerequestoremail($request);
    
        $validator = \Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8'],
            'user_contact' => [
                'required',
                function ($attribute, $value, $fails) use($request) {
                    $userData = User::where('email', $request->user_contact)->orWhere('phone_no', $request->user_contact)->first();
                    if(!$userData){
                        $fails("Your are not authorized person.");
                    }

                    if ( $userData->is_verified !='1') {
                        
                        $fails("Your account is not verified ,otp is send to your registered mail.");
                    }
                }
            ],
        ]);

        $userData = User::where('email', $request->user_contact)->orWhere('phone_no', $request->user_contact)->first();
        if($userData->is_verified=='0'){
        

            if(isset($request->email)){
                $otp = rand(100000,999999);
                event(new Sendemailvarificationotp($otp,$userData));
    
    
    
            }

        }

        
    
        if ($validator->fails()) {
            $responsehtml=view::make('users.otpvarification',['user_contact'=>$request->user_contact,'user_id'=>$userData->id])->render();
            return response()->json(['errormessage' => $validator->errors(),'responsehtml'=>$responsehtml], 422);
        }


        if (Auth::attempt(['email' => $request->user_contact, 'password' => $request->password]) || Auth::attempt(['phone_no' => $request->user_contact, 'password' => $request->password]) ) {
            // Authentication successful
            $user = Auth::user();
                 
        } else {
            
            return response()->json(['errormessage' => 'Your are not authorized person'], 401);
        }
        
        // Continue with your logic if validation passes
        
        
        // if ($validator->fails()) {
        //     return response()->json([
        //         'sucess'=>true,
        //         'errormessage'=>$validator->errors(),
        //     ],422);
        // }

    }
}
