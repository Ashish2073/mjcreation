<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\User;
use app\smsvarification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationControllers extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone_number' => ['sometimes', 'string', 'max:255','unique:users'],
            'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required_without:email'],
            'email' => ['required_without:phone_number'],
        ]);
    }

    protected function create(array $data){

        return User::create([
            'phone_number' => $data['phone_number']??Null,
            'email' => $data['email']??Null,
            'password' => $data['password'],
        ]);


    }


    public function redirectTo()
    {
        return route('register');
    }






}
