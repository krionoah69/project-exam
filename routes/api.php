<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'appointments'], function () { 

    Route::get('all', 'AppointmentController@index'); 
    Route::get('/{appointment}', 'AppointmentController@show'); 
    Route::put('update/{appointment}', 'AppointmentController@update'); 

});
Route::get('getFirst', 'AppointmentController@getFirstAvailable'); 
Route::get('getOrder', 'AppointmentController@getOrder');
Route::get('getFiltered', 'AppointmentController@getFiltered');
Route::get('getAssigned', 'AppointmentController@getAssigned');


