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
    return view('home');
});



/*Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
*/


Auth::routes();

Route::group(['prefix' => 'auth'], function () {
    Route::get('/', 'Auth\LoginController@show');
	Route::get('logout', function (){
		Auth::logout();
		return redirect('/');
	});
	
    Route::get('{provider}', 'Auth\LoginController@redirectToProvider');
	Route::get('{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});

Route::group(['prefix' => 'signup'], function () {
	Route::get('/', 'Auth\RegisterController@create')->name('signup');
	Route::post('/', 'Auth\RegisterController@store');
});