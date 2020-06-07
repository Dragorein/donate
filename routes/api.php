<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/auth')->group(function() {
    Route::post('/register', 'UserController@register');
    Route::post('/login', 'UserController@login');
    Route::middleware('auth:api')->get('/current', 'UserController@currentUser');
});

Route::get('/','SubmissionController@all');
Route::get('/getProfileInformation/{id}','ProfileController@get_history_submision_donation');
Route::get('/DataSubmision/{id}','SubmissionController@show_campaign_detail');
Route::post('/donation', 'DonationController@Donations');
Route::get('/informationpayment', 'DonationController@information_donation');
Route::get('/cari', 'SearchController@index');
Route::post('/CloseSubmisi/{id}','ProfileController@Close_Submission');
Route::post('/CloseSubmisi/{id}','ProfileController@Close_Submission');
Route::post('/withdraw','ProfileController@submit_withdraw');