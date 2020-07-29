<?php
/**/
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('/settings', function(){
	return view('settings.index');
})->name('settings');*/

/*Route::get('/sitesx', function(){
	return view('sites.index');
})->name('sitesx');
*/

/*Route::get('/texts', function(){
	return view('texts.index');
})->name('texts');*/
/*Route::get('/texts2', function(){
	return view('texts.index2');
})->name('texts2');*/
/*Route::get('/statistics', function(){
	return view('statistics.index');
})->name('statistics');*/
/*Route::get('/footer', function(){
	return view('footer.index');
})->name('footer');*/

/*Route::get('/sites_view', function(){
	return view('sites.sites_view');
})->name('sites_view');
*/


Route::group(['middleware' => ['auth']], function () {

Route::POST('/update-user-password','HomeController@update_user_password')->name('user.update-password');
Route::get('/',function(){
	return redirect()->route('sites.index');
});
Route::resource('pages','SitePageController',['only' => ['index', 'update', 'store','edit','destroy']]);
Route::get('/pages/{site_id}', 'SitePageController@index')->name('pages.index');
Route::get('/pages', 'SitePageController@site_index')->name('pages.site_index');
Route::get('/pages/{site_id}/create', 'SitePageController@create_site_page')->name('pages.create_site_page');
Route::POST('/pages/{site_id}/store', 'SitePageController@create_site_page_store')->name('pages.create_site_page_store');


Route::resource('texts','SiteTextController',['only' => ['index', 'update', 'store','edit','destroy']]);
Route::get('/texts/{page_id}', 'SiteTextController@index')->name('texts.index');



/*Route::resource('texts','SiteTextController',['only' => ['index', 'update', 'store','edit','destroy']]);
Route::get('/texts/{page_id}', 'SiteTextController@index')->name('texts.index');*/


Route::resource('sites','SiteController',['only' => ['index', 'update', 'store','edit','destroy']]);



Route::resource('settings','AdvController',['only' => ['index', 'update']]);
Route::get('settings','AdvController@index')->name('settings.index');
Route::get('settings/{site_id}','AdvController@index_site')->name('settings.site');
Route::get('settings/all/all','AdvController@all')->name('settings.all');
Route::PATCH('settings/all/all','AdvController@all_post')->name('settings.all_post');

Route::resource('site-profile','SiteProfileController',['only' => ['index', 'update', 'store','edit','destroy']]);
Route::get('site-profile/{site_id}','SiteProfileController@index_site')->name('site-profile.site');

Route::resource('footer','FooterController',['only' => ['index', 'update', 'store','edit','destroy']]);
Route::get('footer/{site_id}','FooterController@index_site')->name('footer.site');



Route::resource('statistics','StatisticController',['only' => ['index', 'update']]);
Route::get('statistics','StatisticController@index')->name('statistics.index');
Route::get('statistics/{site_id}','StatisticController@index_site')->name('statistics.site');
Route::get('statistics/all/all','StatisticController@all')->name('statistics.all');

Route::POST('statistics/all/all/site_ajax/{site_id}','StatisticController@get_google_visites')->name('statistics.get_google_visites');



//Route::get('/test','TestingController@index');


    //
});