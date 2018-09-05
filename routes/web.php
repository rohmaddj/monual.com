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

Route::get('/', 'HomeController@index')->name('homepage');

// login
Route::get('/admin', 'LoginController@index')->name('login');
Route::post('/admin', 'LoginController@submit')->name('login.post');

// admin dashboard
Route::get('/admiin', 'AdminController@index')->name('dashboard');

Route::post('partnerImageUpload', 'AdminController@uploadImagePartner')->name('partner.image.upload');
Route::post('addPartner', 'AdminController@addPartner')->name('add.partner');
Route::get('partner/{id}', 'AdminController@getPartnerById')->name('get.partnerById');
Route::put('partner/{id}', 'AdminController@putPartner')->name('put.partner');
Route::delete('partner/{id}', 'AdminController@deletePartner')->name('delete.partner');
