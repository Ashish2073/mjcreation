<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegistrationControllers;
 
 



Route::get('/', function () {
    return view('users.registration');
});



Route::post('users/registration',[RegistrationControllers::class,'register'])->name('users-registration');

Route::get('users/verification',[RegistrationControllers::class,'verificationview']);

Route::post('users/otpverification',[RegistrationControllers::class,'verifiedOtp'])->name('user-otpverification');

Route::post('users/otpresend',[RegistrationControllers::class,'otpresend'])->name('user-otpresend');

