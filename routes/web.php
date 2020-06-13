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
    return view('components/home');
});
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('set_login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');;


Route::resource('athletes', 'AthleteController')->middleware('auth');

Route::resource('payments', 'PaymentController')->middleware('auth');

Route::put('month/{month}', 'MonthController@update')->name('month')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home');
