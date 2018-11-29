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
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('/', 'HomeController@postHome');

Route::get('/details/{id}', 'DetailsController@getDetails');

Route::post('/details/', 'DetailsController@postDetails');

Route::put('/details/', 'DetailsController@putDetails');



Auth::routes(['verify' => true]);

Route::post('/user/edit_profile', 'User\EditUserInfo@edit')->name('user.edit_prof');

Route::post('/user/upload_avatar', 'User\EditUserInfo@uploadPhoto')->name('user.upload_avatar');
