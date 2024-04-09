<?php

if(!function_exists('mergerequestoremail')) {
    function mergerequestoremail($request)
    {
        $emailPattern = '/^[a-zA-Z0-9._%+-]+@gmail\.com$/';
        $phoneNumberPattern='/^[6-9]\d{9}$/';


        if(preg_match($emailPattern,$request->user_contact)){
            $request->merge(['email' => $request->user_contact]);
        }

        if(preg_match($phoneNumberPattern,$request->user_contact)){
            $request->merge(['phone_number' => $request->user_contact]);
        }
    }
}


?>