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
Route::get('/customer/{mobile}', 'ApiController@getCustomer');
Route::get('/customer/email/{email}', 'ApiController@getCustomerFromEmail');
Route::get('/service/{service}', 'ApiController@getService');
Route::get('/order', 'ApiController@order');
Route::get('/pending_order', 'ApiController@pendingOrder');
Route::get('/vendor', 'ApiController@vendor');