<?php

use Illuminate\Support\Facades\Route;

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

/**
 * Default Guard. User
 */
Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

/**
 * Admin Routes
 */
Route::namespace('Admin')->prefix('admin')->group(function() {
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
    Route::get('password/reset', 'Passwords\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/email', 'Passwords\ForgetPasswordController@SendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset/{token}', 'Passwords\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset', 'Passwords\ResetPasswordController@reset')->name('admin.password.update');

    Route::middleware('auth:admin')->group(function() {
        Route::post('logout', 'LoginController@logout')->name('admin.logout');
        Route::get('home', 'HomeController@index')->name('admin.home');
    });
});
