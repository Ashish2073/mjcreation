<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\auth\RegistrationControllers;





Route::get('/', function () {
    return view('users.registration');
});



Route::post('users/registration',[RegistrationControllers::class,'register'])->name('users-registration');

// Route::get('users/verification',[RegistrationControllers::class,'verification']);



