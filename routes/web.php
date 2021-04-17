<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset'    => false,
    'verify'   => false,
]);

//user -> home
Route::middleware('auth:user')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

//admins
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Auth::routes([
        'register' => false,
        'reset'    => false,
        'verify'   => false,
    ]);
    //admin -> home
    Route::middleware('auth:admin')->group(function () {
        Route::get('home', 'HomeController@index')->name('home');
    });
});



Route::get('/home', 'HomeController@index')->name('home');
