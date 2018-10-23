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

Auth::routes();


Route::get('/home', 'HomeController@index');
Route::post('/messages', 'HomeController@send')->name('messages.store');
Route::get('messages/{id}', 'HomeController@show')->name('mshow');
Route::get('/notifications', 'NotificationsController@index');
Route::patch('/notifications/{id}', 'NotificationsController@read')->name('notifications.read');
Route::delete('/notifications/{id}', 'NotificationsController@destroy')->name('notifications.delete');
