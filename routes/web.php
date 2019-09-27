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

// Admin Authentication Routes...
Route::prefix('admin')->group(function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin/login');
    Route::post('/login', 'AdminAuth\LoginController@login')->name('admin/login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin/logout');

    Route::get('/', 'AdminsController@index')->name('admin');
});


// User Authentication Routes...
Route::get('login', 'UserAuth\LoginController@showLoginForm')->name('login');
Route::post('login', 'UserAuth\LoginController@login')->name('login');
Route::post('logout', 'UserAuth\LoginController@logout')->name('logout');

// User Registration Routes...
Route::get('register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'UserAuth\RegisterController@register')->name('register');

// User Password Reset Routes...
Route::post('password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.update');
Route::get('password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'UsersController@index')->name('dashboard');
    Route::get('/profile', 'UsersController@profile')->name('dashboard.profile');
});

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/registration', function () {
//     return view('registration');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/home', 'UsersController@index')->name('home');
