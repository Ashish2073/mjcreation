<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegistrationControllers;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\vendor\ProductController;
use App\Http\Controllers\Admin\HomeController;

 
 



Route::get('/', function () {
    return view('users.registration');
});


Route::get('vendors/home',function(){
    return view('livewire.managedashboard.index');
});


Route::post('users/registration',[RegistrationControllers::class,'register'])->name('users-registration');

Route::get('users/verification',[RegistrationControllers::class,'verificationview']);
Route::get('users/login',[LoginController::class,'usersloginview'])->name('users-login');

Route::post('users/otpverification',[RegistrationControllers::class,'verifiedOtp'])->name('user-otpverification');

Route::post('users/otpresend',[RegistrationControllers::class,'otpresend'])->name('user-otpresend');

Route::post('users/authlogin',[LoginController::class,'usersauthlogin'])->name('users-auth-login');

Route::get('users/home',[LoginController::class,'homeview'])->name('users-home-view');







//vendors///////

 
Route::get('vendors/addproduct',[ProductController::class,'vendorproductview'])->name('vendors-addproduct');

Route::post('vendors/subproduct-categories',[ProductController::class,'handleChange'])->name('vendors-subproduct-categories');

Route::post('vendors/saveproduct',[ProductController::class,'saveproduct'])->name('vendor-saveproduct');

Route::post('vendors/product-textarea-image-upload',[ProductController::class,'textareaimageupload'])->name('product-textarea-image-upload');



///importdata////////////
Route::get('import/bulkproduct',[ProductController::class,'bulkimport'])->name('bulk.import');
Route::post('import/product',[ProductController::class,'importproductdata'])->name('import.product.data');

Route::post('import/productspecification',[ProductController::class,'importproductspecificationdata'])->name('import.product.specification.data');

Route::post('import/productprimarycost',[ProductController::class,'importproductprimarycostdata'])->name('import.product.primary.cost.data');
