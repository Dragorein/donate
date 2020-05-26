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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/','SubmissionController@all');
Route::get('/DataSubmision/{id}','SubmissionController@show_campaign_detail');
Route::get('/DataDonatur/{id}','SubmissionController@show_campaign_detail_donatur');
Route::post('/donation', 'DonationsController@Donations');
Route::get('/informationpayment', 'DonationsController@information_donation');