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

Route::get('/', 'FrontController@index')->name('home');
Route::get('/contacts', 'FrontController@contacts')->name('contacts');

Auth::routes();
Route::get('/mail','BackendController@mail');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile/profile_edit','DashboardController@profile_edit')->name('profile_edit');
Route::post('/profile','DashboardController@profile_saved')->name('profilesaved');
Route::get('/profile','BackendController@profileshow')->name('profileshow');
Route::get('/profile/{id}','BackendController@showprofile');

Route::group(['prefix' => 'blogs'], function () {
//    Route::get('/create', 'FrontController@create')->name('create')->middleware('userauth');
    Route::get('/create', 'FrontController@create')->name('create')->middleware('auth');
    Route::post('/created', 'BackendController@store')->name('store');
    Route::get('/','BackendController@bloglists')->name('bloglists');
    Route::get('/show/{id}', 'BackendController@show');
    Route::get('/edit/{id}', 'FrontController@edit')->middleware('auth');
    Route::post('/edited/{id}', 'BackendController@edited');
    Route::get('/delete/{id}', 'BackendController@delete')->middleware('auth');
    Route::post('/comment/{id}','BackendController@comment')->name('comment')->middleware('auth');
});
