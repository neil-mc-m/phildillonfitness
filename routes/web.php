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

Route::get('/login', 'LoginController@showLoginForm');
Route::post('/auth', 'LoginController@authenticate');
Route::get('/admin/dashboard', function() {
    return view('dashboard');
});
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::resource('camps', 'CampController');
});




