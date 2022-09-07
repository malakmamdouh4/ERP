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

// add settings
Route::post('/add-settings','api\SettingsController@addSettings');

// get lists of settings
Route::get('/lists','api\SettingsController@lists');

// add new client
Route::post('/add-client','api\ClientController@addClient');

// check phone
Route::post('/check-phone','api\ClientController@checkPhone');

Route::post('/test',function( Request $request){
    $new = strtotime($request->created);
    return $new ;
});
