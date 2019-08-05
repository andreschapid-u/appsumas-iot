<?php

/*
php artisan vendor:publish --tag=laravel-errors
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
    // $mac = "00-1b:4d:65:2d:0e";

    // if (preg_match('/^([A-F0-9]{2}[:]){5}[A-F0-9]{2}$/i', $mac)) {
    //     echo "La mac es correcta";
    // } else {
    //     echo "La mac es incorrecta";
    // }
    // dd();
    return view('welcome');
});
// Authentication Routes...
Route::get('ingresar', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('ingresar', 'Auth\LoginController@login');
Route::post('salir', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('registrarse', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registrarse', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('recuperar/contrasenia', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('validar/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('recuperar/contrasenia/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('recuperar/contrasenia', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::emailVerification();

Route::get('/inicio', 'HomeController@index')->name('home');

Route::resource('jugadores', 'ChildController');
Route::resource('dispositivo', 'DeviceController');
Route::resource('retos', 'ChallengeController');
Route::resource('retos/operaciones', 'OperationController');
