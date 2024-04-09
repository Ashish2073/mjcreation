<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegistrationControllers;
use App\Http\Controllers\User\Auth\LoginController;
 
 



Route::get('/', function () {
    return view('users.registration');
});



Route::post('users/registration',[RegistrationControllers::class,'register'])->name('users-registration');

Route::get('users/verification',[RegistrationControllers::class,'verificationview']);
Route::get('users/login',[LoginController::class,'usersloginview'])->name('users-login');

Route::post('users/otpverification',[RegistrationControllers::class,'verifiedOtp'])->name('user-otpverification');

Route::post('users/otpresend',[RegistrationControllers::class,'otpresend'])->name('user-otpresend');

Route::post('users/authlogin',[LoginController::class,'usersauthlogin'])->name('users-auth-login');

