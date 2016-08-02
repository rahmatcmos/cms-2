<?php

/**
 * Created by Beyond Plus <bplusmyanmar@hotmail.com>
 * User: Beyond Plus
 * Date: D/M/Y
 * Time: MM:HH PM
 */

Route::any('/password/reset','Front\FrontController@index');

Route::group(['prefix' => 'bp-admin','namespace'  =>  'BpAdmin', 'middleware' => 'admins'], function () {
		Route::get('custom/test', 'TestController@custom');
	});
// Route::group(['prefix' => 'api/v1','namespace'  => 'Api\Ver1', 'middleware' => 'auth:api'], function () {
//     Route::resource('posts', 'Posts');
// });


