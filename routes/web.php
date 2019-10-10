<?php

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
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('orders', 'OrderController');
    Route::resource('services', 'ServiceController');
    Route::resource('vendors', 'VendorController');
    Route::resource('customers', 'CustomerController');

    Route::get('/orders/{order}/add-item', 'OrderController@getAddItem')->name('add-item-to-order');
    Route::post('/orders/{order}/add-item', 'OrderController@addItem')->name('add-item-to-order');
    Route::get('/orders/{item}/edit-item', 'OrderController@editItem')->name('edit-order-item');
    Route::post('/orders/{item}/edit-item', 'OrderController@updateItem')->name('update-order-item');
    Route::post('/orders/{order}/edit', 'OrderController@update')->name('update-order');
    Route::get('/orders/{order}/delete', 'OrderController@destroy')->name('delete-order');
    Route::get('/orders/{item}/delete-item', 'OrderController@destroyItem')->name('delete-item');
    Route::get('/order/{order}/action', 'OrderController@action')->name('order.action');
    Route::post('/order/{order}/action', 'OrderController@takeAction')->name('order.action');
    
    Route::resource('categories', 'CategoryController');
    Route::resource('subcategories', 'SubcategoryController');
    Route::resource('locations', 'LocationController');
    Route::resource('reference', 'ReferenceController');

    Route::get('/v2/orders/create', 'OrderV2Controller@create')->name('create-order');

});
