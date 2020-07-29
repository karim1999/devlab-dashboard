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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['prefix' => 'v1' /*, 'middleware' => 'auth:api'*/],function ( ) {
    // Users
  	
    Route::get('site/{site_link}', 'ApiController@index');
    Route::get('site/{site_link}/', 'ApiController@index');
  	Route::get('site/https://{site_link}', 'ApiController@index');
  	Route::get('site/http://{site_link}', 'ApiController@index');
  	Route::get('site/http://{site_link}/', 'ApiController@index');
  	Route::get('site/https://{site_link}/', 'ApiController@index');
  	Route::get('sites','ApiController@sites');
});



/*Route::middleware('auth:api')->get('/api/site', function (Request $request) {


    return $request->user();
});*/