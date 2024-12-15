<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\swaggerGetUserDetails;

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

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [swaggerGetUserDetails::class, 'index'])->name('login');
Route::post('/mainpage', [swaggerGetUserDetails::class, 'store'])->name('login.store');
Route::get('/mainpage', [swaggerGetUserDetails::class, 'mainpage2']);
Route::get('/profile', [swaggerGetUserDetails::class, 'profile']);
Route::post('/logout', [swaggerGetUserDetails::class, 'logout'])->name('logout');
Route::get('/logout', [swaggerGetUserDetails::class, 'logout'])->name('logout');
