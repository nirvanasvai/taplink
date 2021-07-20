<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[App\Http\Controllers\Client\PagesController::class,'index'])->name('index.page');
Route::get('/cabinet',[App\Http\Controllers\Client\AuthPagesController::class,'index'])->name('index.auth.page')->middleware('auth');
Route::get('portfolio/{slug}',[App\Http\Controllers\Client\AuthPagesController::class,'profile'])->name('profile.auth.page')->middleware('auth');
Route::get('/login', [\App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::get('/register', [\App\Http\Controllers\AuthController::class,'register'])->name('register');
Route::get('/reset', [\App\Http\Controllers\AuthController::class,'resetPassword'])->name('reset');
Route::get('/password', [App\Http\Controllers\AuthController::class,'newPassword'])->name('password');
Route::post('/logout', [\App\Http\Livewire\RegisterLogin::class,'logout'])->name('logout');
