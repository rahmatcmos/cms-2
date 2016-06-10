<?php

/**
 * Created by Beyond Plus <bplusmyanmar@hotmail.com>
 * User: Beyond Plus
 * Date: D/M/Y
 * Time: MM:HH PM
 */

Route::any('/password/reset','Front\FrontController@index');
Route::group(['prefix' => 'api/v1','namespace'  => 'Api\Ver1', 'middleware' => 'auth:api'], function () {
    Route::resource('posts', 'Posts');
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::any('/register','Front\FrontController@index');
    Route::post('bp-admin/login','BpAdmin\Main@login_admin_post'); 
    Route::get('bp-admin/login', function(){
        return view('auth/adminlogin');
    });

    Route::group(['prefix' => 'bp-admin','namespace'  => 'BpAdmin', 'middleware' => 'admins'], function () {
   // Route::any('/register','Front\FrontController@index');
    Route::get('/', 'AdminController@index');
    Route::get('logout','Main@logout');

    Route::resource('post', 'PostController');
    Route::get('post/delete/{id}','PostController@destroy');

    Route::resource('page', 'PageController');
    Route::get('page/delete/{id}','PageController@destroy');
    
    Route::get('user', 'UserController@index');
    Route::get('user/add', 'UserController@create');
    Route::post('user/add', 'UserController@store');
    Route::get('user/{id}','UserController@edit');
    Route::put('user/{id}', 'UserController@update');
    Route::get('user/delete/{id}', 'UserController@destroy');

    Route::get('media', 'MediaController@index');
    Route::get('media/add', 'MediaController@create');
    Route::post('media/add', 'MediaController@store');
    Route::get('media/{id}', 'MediaController@edit');
    Route::put('media/{id}','MediaController@update');
    Route::get('media/delete/{id}','MediaController@destroy');

    Route::get('slider', 'SliderController@index');
    Route::get('slider/add', 'SliderController@create');
    Route::post('slider/add', 'SliderController@store');
    Route::get('slider/{id}', 'SliderController@edit');
    Route::put('slider/{id}','SliderController@update');
    Route::get('slider/delete/{id}','SliderController@destroy');

    Route::get('menu', 'MenuController@index');
    Route::get('menu/add', 'MenuController@create');
    Route::post('menu/add', 'MenuController@store');
    Route::get('menu/{id}', 'MenuController@edit');
    Route::put('menu/{id}','MenuController@update');
    Route::get('menu/delete/{id}','MenuController@destroy');
    Route::post('menu/pagestore', 'MenuController@pageStore');
    Route::post('menu/poststore', 'MenuController@postStore');
    

    Route::get('category', 'CategoryController@index');
    Route::get('category/add', 'CategoryController@create');
    Route::post('category/add', 'CategoryController@store');
    Route::get('category/{id}', 'CategoryController@edit');
    Route::put('category/{id}','CategoryController@update');
    Route::get('category/delete/{id}','CategoryController@destroy');

    Route::get('tax', 'TaxController@index');
    Route::get('tax/add', 'TaxController@create');
    Route::post('tax/add', 'TaxController@store');
    Route::get('tax/{id}', 'TaxController@edit');
    Route::put('tax/{id}','TaxController@update');
    Route::get('tax/delete/{id}','TaxController@destroy');

    Route::get('generals','SettingsController@index');
    Route::get('generals/add', 'SettingsController@generaledit');
    Route::post('generals/add', 'SettingsController@generaledit');


    Route::get('account', 'AccountController@index');
    Route::get('account/add', 'AccountController@create');
    Route::post('account/add', 'AccountController@store');
    Route::get('account/{id}','AccountController@edit');
    Route::put('account/{id}', 'AccountController@update');
    Route::get('account/delete/{id}', 'AccountController@destroy');


    });

    Route::get('/', 'Front\FrontController@index');    
    Route::get('/{name}', 'Front\FrontController@post');
    Route::get('/cat/{name}', 'Front\FrontController@cat');

    Route::get('/test', function(){
       return abort(404);
    });

// index.php -> create ထည့္, edit ထည့္
// add.php -> add  ျဖဳတ္
    
});

