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
    return view('landing');
});

Route::get('/search/{any}', function () {
    return view('home');
});


Route::get('/welcome', function () {
    return view('welcome');
});

Route::post('/auth/register', 'UserController@register');
Route::post('/auth/login', 'UserController@login');
Route::post('/auth/logout', 'UserController@logout');
Route::get('/auth/current', 'UserController@currentUser');

Route::get('/dashboard/all', 'DashboardController@index');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{vue_capture?}', function () {
    return view('landing');
})->where('vue_capture', '[\/\w\.-]*');

// Route::prefix('auth')->group(function(){
//     Route::get('init', 'LoginController@init');

//     Route::post('login', 'LoginController@login');
//     Route::post('logout', 'LoginController@logout');
//     });
