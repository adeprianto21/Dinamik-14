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

// ===================================== Admin Route Section ============================================

// Admin Authentication Routes...

Route::prefix('admin')->group(function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
    Route::get('/teams', 'AdminsController@showTeams')->name('admin.teams');
    Route::get('/teams/{id}', 'AdminsController@showTeamDetail')->name('admin.team.detail');
    Route::get('/karya', 'AdminsController@showTeamKarya')->name('admin.karya');
    Route::get('/karya/{id}', 'AdminsController@showTeamKaryaDetail')->name('admin.karya.detail');
    Route::get('/payments', 'AdminsController@showPayments')->name('admin.payments');
    Route::get('/payment/{id}', 'AdminsController@showPaymentDetail')->name('admin.payment.detail');
    Route::get('/payment/{id}/{status}', 'AdminsController@updatePaymentStatus')->name('admin.update.payment');
    Route::get('/seminar', 'AdminsController@showSeminarParticipants')->name('admin.seminar');
    Route::get('/seminar/{id}', 'AdminsController@showSeminarParticipantDetail')->name('admin.seminar.detail');
    Route::get('/seminar/sendticket/{id}', 'AdminsController@sendTicketSeminar')->name('admin.seminar.send');
    Route::get('/music', 'AdminsController@showFormFestivalMusic')->name('admin.music');
    Route::post('/music/sendticket', 'AdminsController@sendTicketFestivaMusic')->name('admin.music.send');

    Route::get('/', 'AdminsController@index')->name('admin');
});

// ===================================== User Route Section ============================================

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

// User Dashboard
Route::prefix('dashboard')->group(function () {
    Route::get('/', 'UsersController@index')->name('dashboard');
    Route::get('/profile', 'UsersController@profile')->name('dashboard.profile');
    Route::get('/karya', 'UsersController@karya')->name('dashboard.karya');
    Route::get('/karya/edit', 'UsersController@editKarya')->name('dashboard.karya.edit');
    Route::post('/karya/insert', 'UsersController@insertKarya')->name('dashboard.insert.karya');
    Route::post('/karya/update', 'UsersController@updateKarya')->name('dashboard.update.karya');
    Route::get('/payment', 'UsersController@payment')->name('dashboard.payment');
    Route::get('/payment/edit', 'UsersController@editPayment')->name('dashboard.payment.edit');
    Route::post('/payment/insert', 'UsersController@insertPayment')->name('dashboard.insert.payment');
    Route::post('/payment/update', 'UsersController@updatePayment')->name('dashboard.update.payment');
    Route::post('/profile/team', 'UsersController@updateTeam')->name('dashboard.profile.update.team');
    Route::post('/profile/participant', 'UsersController@insertParticipant')->name('dashboard.profile.insert.participant');
});

// ===================================== Guest Section ============================================

Route::get('/', 'HomeController@index')->name('home');
Route::get('/pca', 'HomeController@pca')->name('pca');
Route::get('/netcomp', 'HomeController@netcomp')->name('netcomp');
Route::get('/cspc', 'HomeController@cspc')->name('cspc');
Route::get('/webdev', 'HomeController@webdev')->name('webdev');
Route::get('/animation', 'HomeController@animation')->name('animation');
Route::get('/seminar', 'HomeController@seminar')->name('seminar');
Route::get('/seminar/register', 'HomeController@showFormRegisterSeminar')->name('seminar.register');
Route::post('/seminar/insert', 'HomeController@insertPesertaSeminar')->name('seminar.insert.peserta');
Route::get('/seminar/success', 'HomeController@showSuccessRegisterSeminar')->name('seminar.register.success');
Route::get('/testmail', function() {
    return view('templates.email.email-seminar-paid');
});
Route::get('/testpdf', function() {
    return view('templates.pdf.music');
});
