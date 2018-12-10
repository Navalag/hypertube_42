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

Route::group(['middleware' => ['auth.language']], function () {
	Auth::routes(['verify' => true]);
	Route::post('/set_locale', 'Auth\LoginController@setLanguage')->name('setLanguage');
});


Route::group(['middleware' => ['language']], function () {

    Route::get('/', 'HomeController@index')->name('home');
	Route::post('/', 'HomeController@postHome');

	Route::get('/details/{id}', 'DetailsController@getDetails');
	Route::post('/details/', 'DetailsController@postDetails');
	Route::put('/details/', 'DetailsController@putDetails');

	Route::post('/user/edit_profile', 'User\EditUserInfo@edit')->name('user.edit_prof');
	Route::get('/user/set_lang', 'User\EditUserInfo@setLanguage')->name('user.set_lang');
	Route::post('/user/upload_avatar', 'User\EditUserInfo@uploadPhoto')->name('user.upload_avatar');
});

/*
** OAuth routes [GitHub]
*/
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
/*
** OAuth routes [Google+]
*/
Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');

/*
** OAuth routes [42]
*/
Route::get('login/42', 'Auth\LoginController@redirectToProvider42');
Route::get('login/42/callback', 'Auth\LoginController@handleProviderCallback42');
