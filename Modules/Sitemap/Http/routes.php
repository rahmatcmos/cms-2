<?php

Route::group(['middleware' => 'web', 'prefix' => 'sitemap', 'namespace' => 'Modules\Sitemap\Http\Controllers'], function()
{
    Route::get('/sitemap.xml', 'SitemapController@index');
	Route::get('/posts', 'SitemapController@posts');
	Route::get('/categories', 'SitemapController@categories');
});
