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

Route::get('/','pagescontroller@index');
Route::get('/about','pagescontroller@about')->name('about');
Route::get('/contact','pagescontroller@contact')->name('contact');
Route::post('/mail','pagescontroller@send');


Route::resource('/web','postcontroller');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
