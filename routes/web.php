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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('cek');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profil','ProfilController@index')->name('profil');
Route::get('/profil/edit','ProfilController@edit')->name('edit');
Route::put('/profil','ProfilController@update')->name('update');
Route::delete('/profil/del','ProfilController@destroy')->name('hapus');
// Route::resource('profil', 'ProfilController');