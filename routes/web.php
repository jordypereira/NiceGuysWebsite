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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin/home/header/edit', 'HomeController@editHeader')->name('admin.home.header.edit');
Route::put('/admin/home/header/update', 'HomeController@updateHeader')->name('admin.home.header.update');
Route::resource('/admin/home', 'HomeBlockController');

Route::resource('admin/pages', 'PageController');

Route::resource('admin/images', 'ImageController');

Route::resource('admin/counter', 'CountController');

Route::post('admin/order/update', 'HomeBlockController@updateOrder')->name('admin.order.update');

Route::get('/admin', 'PageController@admin_page');


// Route::get('/register', 'HomeController@index');

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
Route::get('/{slug}', 'PageController@show');
