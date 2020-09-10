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
Route::get('/s','MailController@getMail');
Route::get('/', function () {
	
	return view('welcome');
});

Route::get('Principal/{variable}','PrincipalController@prueba');

Route::resource('Crud','CrudController');

Route::get('/name/{name}/apellido/{apellido?}', function ($name,$apellido='null') {
	return 'hola '.$name.' '.$apellido;
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
