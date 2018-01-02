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

Route::get('/', 'FrontendController@home');
Route::get('/pricing', 'FrontendController@pricing');
Route::get('/contact', 'FrontendController@contact');
Route::post('/contact', 'FrontendController@book')->name('contact');
Route::post('/callback', 'FrontendController@callback')->name('callback');

// login/logout routes
Route::get('/login', 'LoginController@showLoginForm');
Route::get('/logout', 'LoginController@logoutAction');
Route::post('/auth', 'LoginController@authenticate');
Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');
});

// resource routes for camps
Route::prefix('admin')->group(function () {
    Route::resource('camps', 'CampController');
});




