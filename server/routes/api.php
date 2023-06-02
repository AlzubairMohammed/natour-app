<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\ForgotPasswordController;
use App\Http\Controllers\API\City\CityController;
use App\Http\Controllers\API\Currency\CurrencyController;
use App\Http\Controllers\API\Favorite\FavoriteController;
use App\Http\Controllers\API\Message\MessageController;
use App\Http\Controllers\API\Rent\RentController;
use App\Http\Controllers\API\Social\SocialLinkController;
use App\Http\Controllers\API\User\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'register']);
Route::post('/resend-otp',[AuthController::class, 'resendOTP']);
Route::post('/contact-verify',[AuthController::class, 'mobileVerify']);
Route::post('/forgot-password',[ForgotPasswordController::class, 'forgotPassword']);
Route::post('/forgot-password/otp/verify',[ForgotPasswordController::class, 'verifyOtp']);
Route::post('/reset-password',[ForgotPasswordController::class, 'resetPassword']);

// Route::get('/rents', function() {
//     if(Auth::guard('api')->check()) {
//        return [RentController::class, 'index'];
//     } else {
//         dd('Hello not logged-in');
//     }
// });

Route::get('/rents',[RentController::class, 'index']);
Route::get('/rents/{id}',[RentController::class, 'show']);

Route::get('city',[CityController::class, 'index']);
Route::post('area',[CityController::class, 'cityWiseArea']);

Route::post('/message',[MessageController::class, 'store']);

Route::get('/currency',[CurrencyController::class ,'index']);

Route::get('rent-type', [RentController::class, 'rentType']);

Route::get('social-link', [SocialLinkController::class, 'index']);


Route::middleware('auth:api')->group(function(){

    Route::get('/favorites',[FavoriteController::class, 'index']);
    Route::get('/favorites/{rent}',[FavoriteController::class, 'favoriteToggle']);

    Route::post('/post',[RentController::class, 'store']);
    Route::post('/post/{rent}',[RentController::class, 'update']);
    Route::get('/post/{rent}/toggle-status',[RentController::class,'toggleStatus']);
    
    Route::get('/my-posts',[RentController::class, 'myPosts']);
    Route::delete('/my-posts/{rent}',[RentController::class, 'destroy']);

    Route::post('/update-profile',[UserController::class, 'updateProfile']);
    Route::post('/update-photo',[UserController::class, 'updateProfilePhoto']);
    Route::post('/change-password',[UserController::class, 'changePassword']);
    Route::post('/logout',[AuthController::class, 'logout']);
});
