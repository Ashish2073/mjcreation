<?php
namespace app;
use Twilio\Rest\Client;

class smsvarification {
    public function otpvarification(){
        $sid = getenv("TWILIO_SID");
       $token = getenv("TWILIO_TOKEN");
       $sendernumber=getenv("TWILIO_PHONE");
       $twilio = new Client($sid, $token);
       $service = $twilio->verify->v2->services->create('+91 8077559624',[ "body"=>"My First Verify Service",
       "form"=> $sendernumber

    ]);

    dd('message successfully');


    }
}

