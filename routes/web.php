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
Route::get('admin/login', 'Admin-Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Admin-Auth\LoginController@login');
Route::post('admin/logout', 'Admin-Auth\LoginController@logout')->name('logout');

// Admin Registration Routes...
Route::get('admin/register', 'Admin-Auth\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('admin/register', 'Admin-Auth\RegisterController@register');

// Admin Password Reset Routes...
Route::post('admin/password/email', 'Admin-Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset/{token}', 'Admin-Auth\ResetPasswordController@showResetForm');
Route::post('admin/password/reset', 'Admin-Auth\ResetPasswordController@reset')->name('admin.password.reset');
Route::get('admin/password/reset', 'Admin-Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');

// User Authentication Routes...
Route::get('login', 'UserAuth\LoginController@showLoginForm')->name('login');
Route::post('login', 'UserAuth\LoginController@login')->name('login');
Route::get('logout', 'UserAuth\LoginController@logout')->name('logout');

// User Registration Routes...
Route::get('register', 'UserAuth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'UserAuth\RegisterController@register')->name('register');

// User Password Reset Routes...
Route::post('password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.reset');
Route::get('password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/registration', function () {
//     return view('registration');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/home', 'UsersController@index')->name('home');
