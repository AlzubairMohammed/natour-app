<?php

use App\Http\Controllers\Web\Areas\AreaController;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Cities\CityController;
use App\Http\Controllers\Web\Currency\CurrencyController;
use App\Http\Controllers\Web\Customers\CustomerController;
use App\Http\Controllers\Web\Dashboard\DashboardController;
use App\Http\Controllers\Web\Messages\MessageController;
use App\Http\Controllers\Web\Rents\RentController;
use App\Http\Controllers\Web\Social\SocialLinkController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin|visitor|root'])->group(function () {

Route::get('/',[DashboardController::class, 'index'])->name('root');

//customer
Route::get('/customers',[CustomerController::class, 'index'])->name('customer');
Route::get('/customers/{customer}/show',[CustomerController::class, 'show'])->name('customer.show');

//message
Route::get('/messages',[MessageController::class, 'index'])->name('messages');

//rents
Route::get('/rents',[RentController::class, 'index'])->name('rent');
Route::get('/rents/{rent}/toggle-status',[RentController::class, 'toggleActivationStatus'])->name('rent.status.toggle');
Route::get('/rents/{rent}/details',[RentController::class, 'show'])->name('rent.details');

//city
Route::get('/cities',[CityController::class, 'index'])->name('city');
Route::post('/cities',[CityController::class, 'store'])->name('city.add');
Route::post('/cities/{city}/edit',[CityController::class, 'edit'])->name('city.edit');

//area
Route::get('/areas',[AreaController::class, 'index'])->name('area');
Route::post('/areas',[AreaController::class, 'store'])->name('area.add');
Route::post('/areas/{area}/edit',[AreaController::class, 'update'])->name('area.edit');

//currency
Route::get('/setting/currenct',[CurrencyController::class, 'index'])->name('setting.currency');
Route::post('/setting/currenct',[CurrencyController::class, 'updateOrCreate'])->name('setting.currency');

//social Link
Route::get('/social-link',[SocialLinkController::class, 'index'])->name('setting.socialLink');
Route::post('/social-link',[SocialLinkController::class, 'store'])->name('setting.socialLink.store');
Route::post('/social-link/{social}',[SocialLinkController::class, 'update'])->name('setting.socialLink.update');
Route::get('/social-link/{social}',[SocialLinkController::class, 'delete'])->name('setting.socialLink.delete');

});
