<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.backend.gentelella');
// });

Route::auth();
Route::group(['middleware' => 'admin'], function () {
    // Route::get('/home', 'HomeController@index');
    // Route::get('/dashboard', 'Backend\BackendController@index');

    Route::get('/customers/search', 'Backend\ApiController@search');
    Route::get('/customers/note', 'Backend\ApiController@note');
    Route::get('/customers/{customerId}/note', 'Backend\ApiController@getCustomerNote');
    Route::post('/customers/{customerId}/note', 'Backend\ApiController@postCustomerNote');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
