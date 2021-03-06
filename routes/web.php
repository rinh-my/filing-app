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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/maine', 'FilingappController@index');
Route::get('/maine/custmer', 'FilingappController@custmer');
Route::get('/maine/secret', 'FilingappController@secret');
Route::get('/maine/meething', 'FilingappController@meething');
Route::get('/maine/mainemail', 'FilingappController@mainmail');

// メッセージ機能
Route::get('/message/create', 'MessageController@create');
Route::post('/message/store', 'MessageController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
