<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('google');

Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('roles','RoleController');
    Route::resource('users','UserController', ['except' => ['destroy']]);
    Route::get('users/{id}/destroy','UserController@destroy')->name('users.destroy');
    Route::get('users-list', 'UserController@usersList');
});
