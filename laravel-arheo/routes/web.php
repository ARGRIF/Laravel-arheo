<?php

use App\Http\Controllers\FindController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\PassportController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('get-village-list','App\Http\Controllers\DropdownController@getVillagesList');

Route::resource('user', UserController::class)->names('user');
Route::resource('post', PostController::class)->names('post');
Route::resource('object', ObjectController::class)->names('object');
Route::resource('find', FindController::class)->names('find');
Route::resource('passport', PassportController::class)->names('passport');
