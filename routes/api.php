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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/users/{user}', function () {
	$category = BeyondPlus\CmsLibrary\Models\Bp_category::get();
	return $category;
    //return array("asdf"=>"asdf");
    //return $user->email;
});
