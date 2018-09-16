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

Route::get('/','AuthController@index')->name('Auth');
Route::get('/register','AuthController@create')->name('register');
Route::post('/login','AuthController@do_login')->name('login');
Route::post('/register','AuthController@store')->name('simpan');
Route::get('/show','AuthController@show')->name('LihatUser');
Route::get('/editUser/{id}','AuthController@edit')->name('editUser');
Route::patch('/editUser/{id}/update','AuthController@update')->name('update');
Route::delete('/deleteUser/{id}/delete','AuthController@delete')->name('delete');