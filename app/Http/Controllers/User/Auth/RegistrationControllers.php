<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Sendemailvarificationotp;
use Twilio\Rest\Client;
use App\Models\User;
use app\smsvarification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class RegistrationControllers extends Controller
{

    public function register(Request $request){
        $emailPattern = '/^[a-zA-Z0-9._%+-]+@gmail\.com$/';
        $phoneNumberPattern='/^[6-9]\d{9}$/';


        if(preg_match($emailPattern,$request->user_contact)){
            $request->merge(['email' => $request->user_contact]);
        }

        if(preg_match($phoneNumberPattern,$request->user_contact)){
            $request->merge(['phone_number' => $request->user_contact]);
        }
        
    
        
        $validator = Validator::make($request->all(), [
            'phone_number' => 'sometimes|string|max:255|unique:users,phone_no',
            'email' => 'sometimes|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'phone_number' => 'required_without:email', 
            'email' => 'required_without:phone_number',
        ]);


        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $userData=User::create([

            'email' => $request->email??Null,
            'phone_no'=>$request->phone_no??Null,
            'password' => Hash::make($request->password),
        ]);
        if(isset($request->email)){
            $otp = rand(100000,999999);
            event(new Sendemailvarificationotp($otp,$userData));



        }

        $request->session()->flash('user_contact', $request->user_contact);

         return redirect("users/verification");

    }



    public function verificationview(){

        return view('users.otpvarification');

    }


    public function verifiedOtp(Request $request)
    {

        $otp1 = $request->input('ot1');
        $otp2 = $request->input('ot2');
        $otp3 = $request->input('ot3');
        $otp4 = $request->input('ot4');
        $otp5 = $request->input('ot5');
        $otp6 = $request->input('ot6');

        $combinedOTP = $otp1 . $otp2 . $otp3 . $otp4 . $otp5 . $otp6;
        $otpNumber = (int)$combinedOTP;

       
        $userOtp= User::where('otp',$otpNumber)->first();

        if(!$userOtp){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = Carbon::now();
            $otpCreatedAt = Carbon::parse($userOtp->created_at);
            $differenceInSeconds = $currentTime->diffInSeconds($otpCreatedAt);

            if($currentTime->greaterThanOrEqualTo($otpCreatedAt) && $differenceInSeconds<=90){//90 seconds
                User::where('id',$userOtp->id)->update([
                    'is_verified' => '1',
                    'email_verified_at'=> Carbon::now()
                ]);
                return response()->json(['success' => true,'msg'=> 'Mail has been verified']);
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }








    






}
