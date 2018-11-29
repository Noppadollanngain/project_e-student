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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/showadmin','AdminController@showAdmin')->name('admin.showadmin');
    Route::get('/addadmin','AdminController@create')->name('admin.addadmin');
    Route::resource('/possition', 'PossitionController')->name('index','possition');
    Route::post('/regis', 'AdminController@Addadmin')->name('admin.regis');
    Route::get('/profile','AdminController@profile')->name('admin.profile');
    Route::get('/viewprofile/destroy/{id}', 'AdminController@destroy')->name('admin.viewprofiledestroy');
    Route::get('/viewprofile/{id}', 'AdminController@viewprofile')->name('admin.viewprofile');
    Route::get('/profile-edit', 'AdminController@edit')->name('admin.profile_edit');
    Route::post('/profile-edit/update/{id}', 'AdminController@profileupdate')->name('admin.profileupdate');

  });
