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

Route::get('/', 'HomeController@index');

Route::get('/admin', 'AdminController@adminpage');
Route::resource('admin/pages', 'PageController');

Route::get('/register', 'HomeController@index');

// Authentication Routes...
$this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('admin/login', 'Auth\LoginController@login');
$this->post('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('admin/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('admin/password/reset', 'Auth\ResetPasswordController@reset');

// Slug route must be last!

Route::get('/{slug}', 'SlugController@slugpage');
