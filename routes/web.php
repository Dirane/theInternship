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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/change-local/{locale}', 'LanguageCtrl@changeLocale');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'SearchController@index')->name('index');
Auth::routes();

Route::group([
		'prefix' => '{locale}'], function () {

		Route::get('/home', 'HomeController@index')->name('home');

		Route::get('/search', 'SearchController@search')->name('search');
		Route::get('/search/details/{company}', 'SearchController@searchDetails')->name('search-details');

		Route::post('/country/states', 'LocationController@ajax_country_states')->name('ajax-country-state');
		Route::post('/state/cities', 'LocationController@ajax_states_cities')->name('ajax-state-cities');

		Route::get('/company/new', 'CompanyController@index')->name('company-index');
		Route::post('/company/new', 'CompanyController@new')->name('company-new');

		Route::get('/media/new', 'CompanyController@media')->name('media');
		Route::post('/media/store', 'CompanyController@storeMedia')->name('store-media');
	});

