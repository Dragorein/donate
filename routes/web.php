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

Route::post('/auth/register', 'UserController@register');
Route::post('/auth/login', 'UserController@login');
Route::post('/auth/logout', 'UserController@logout');
Route::get('/auth/current', 'UserController@currentUser');

Route::get('/dashboard/all', 'DashboardController@index');
Route::post('/user/start', 'SubmissionController@store');

Route::get('/{vue_capture?}', function () {
    return view('landing');
})->where('vue_capture', '[\/\w\.-]*');