<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankInfoController;
use App\Http\Controllers\CatalogLinkController;
use App\Http\Controllers\CompanyInfoController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\SocialMediaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('merchant_panel.login');
});

Route::middleware(['guest'])->group(function () {

 Route::resource('merchant', UserController::class);
 Route::resource('personinfo', PersonalInfoController::class);
 Route::resource('bankinfo', BankInfoController::class);
 Route::resource('catalog', CatalogLinkController::class);
 Route::resource('companyinfo', CompanyInfoController::class);
 Route::resource('socialmedia', SocialMediaController::class);

 Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('change.password');
 Route::get('/changepassword', [PasswordController::class, 'password'])->name('password');
 Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
Route::post('login',[AuthController::class,'login'])->name('login');
