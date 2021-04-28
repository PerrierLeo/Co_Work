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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/board/{id}', 'BoardController@show')->name('boards.show');
Route::post('/board/store', 'BoardController@store')->name('boards.store');
Route::post('/board/list/{id}', 'ListController@store')->name('lists.store');
Route::post('/board/ticket/{id}', 'TicketController@store')->name('tickets.store');

Route::get('/board/ticket/destroy/{id}', 'TicketController@destroy')->name('tickets.destroy');
Route::get('/board/list/destroy/{id}', 'ListController@destroy')->name('lists.destroy');
Route::get('/board/destroy/{id}', 'BoardController@destroy')->name('boards.destroy');
