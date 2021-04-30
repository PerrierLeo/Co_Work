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
Route::post('/board/comment/{id}', 'CommentController@store')->name('comments.store');

//suppression
Route::get('/board/ticket/destroy/{id}', 'TicketController@destroy')->name('tickets.destroy');
Route::get('/board/list/destroy/{id}', 'ListController@destroy')->name('lists.destroy');
Route::get('/board/destroy/{id}', 'BoardController@destroy')->name('boards.destroy');

//profil
Route::get('/board/profil/{id}', 'ProfilController@show')->name('profils.show');
Route::post('/board/profil/firstname/{id}', 'ProfilController@updateFirstName')->name('profil.updateFirstName');
Route::post('/board/profil/lastname/{id}', 'ProfilController@updateLastName')->name('profil.updateLastName');
Route::post('/board/profil/email/{id}', 'ProfilController@updateEmail')->name('profil.updateEmail');
Route::post('/board/profil/picture/{id}', 'ProfilController@updatePicture')->name('profil.updatePicture');
