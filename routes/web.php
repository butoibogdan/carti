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

Route::get('/', 'FO\\HomeController@index');
Route::get('confirmation/{idu}/{idk}', 'FO\\HomeController@approve');


Route::group(['middleware' => 'web'], function() {
// Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('logout', 'Auth\LoginController@logout');

// Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Administare panel
    Route::group(['prefix' => 'auth'], function() {
        Route::get('administrare', 'BO\LoginController@showAdminLoginForm');
        Route::post('administrare', 'BO\LoginController@adminLoginPost');
    });
});

Route::group(['prefix' => 'auth'], function() {
    Route::group(['middleware' => ['web', 'admin:1']], function() {
        Route::get('dashboard', 'BO\\DashBoardController@index');
        Route::resource('authors', 'BO\\AuthorsController');
        Route::resource('tags', 'BO\\TagsController');
        Route::resource('books', 'BO\\BooksController');
    });
});

Route::group(['middleware' => ['web', 'auth']], function() {
    Route::get('account/{id}', 'FO\\HomeController@accountDetails');
    Route::post('changeaccount/overview', 'FO\\HomeController@overview');
    Route::post('changeaccount/password', 'FO\\HomeController@password');
});
