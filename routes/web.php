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
// auth routes
Auth::routes();

Route::get('/', 'PostController@index' )->middleware('auth');
Route::get('/home', function() { return view('home'); })->name('home');

//google login
Route::get('/login/google', 'Auth\SocialLoginController@redirectToGoogle')->name('google.redirect');
Route::get('/login/google/process', 'Auth\SocialLoginController@processLoginGoogle');

//routes post


Route::post('/post/filter', 'PostController@filter');
Route::resource('post', 'PostController');
//routes user
Route::get('/user/admin/{id}', 'UserController@showAdmin');
Route::resource('user', 'UserController');