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

Route::middleware(['auth'])->group(function () {
    Route::middleware(['mac'])->group(function () {
        Route::get('/inicio', 'HomeController@index')->name('home');
        Route::resource('jugadores', 'ChildController');
        Route::get("jugar", "ChildController@play")->name("jugar");
        Route::get("jugar/{jugador}", "ChildController@validar")->name("jugar.validar");
        Route::post("jugador", "ChildController@irhome")->name("jugador.irhome");
        Route::get("jugador", "ChildController@home")->name("jugador.home");
        Route::get("jugador/retos", "ChildController@retos")->name("jugador.retos");
        Route::get("jugador/retos/resolver/{reto}", "ChildController@resolver")->name("jugador.retos.resolver");
        Route::post("jugador/retos/resolver", "ChildController@guardarOperacion")->name("jugador.retos.guardar");
    });
    Route::resource('dispositivo', 'DeviceController');
    Route::resource('retos', 'ChallengeController');
    Route::resource('retos/operaciones', 'OperationController');
});
