<?php

use App\Http\Controllers\FindController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('auth/login');
});

Route::get('/legend', function () {
    return view('legend');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('user', UserController::class)->names('user');
Route::resource('post', PostController::class)->names('post');
Route::resource('object', ObjectController::class)->names('object');
Route::resource('find', FindController::class)->names('find');
Route::resource('passport', PassportController::class)->names('user');
