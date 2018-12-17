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

    Route::get('/document/search/{id}', 'DocumentController@search_form_doc')->name('admin.document-search');
    route::post('/document/search/word/{id}','DocumentController@search_word_doc')->name('admin.document-search-word');

    route::get('/view-user/{id}','DocumentController@view_user')->name('admin.view-user');
    route::get('/search-user','DocumentController@search_form')->name('admin.search-user');
    route::post('/search-user/word/','DocumentController@search_word')->name('admin.search-word');

    route::get('/create-document/{id}','DocumentController@create_document')->name('admin.create-doc');
    route::get('/update-document/{id}','DocumentController@update_document')->name('admin.update-doc');
    route::post('/document-create/{id}','DocumentController@document_create')->name('admin.doc-create');
    route::post('/document-update/{id}','DocumentController@document_update')->name('admin.doc-update');

    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
  });
