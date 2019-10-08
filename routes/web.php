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

Route::get('/todo', 'Todo@index')->name('todoIndex'); // show komentar list
Route::get('/todo/finish', 'Todo@finish')->name('todoFinish');
Route::get('/todo/new', 'Todo@new_form')->name('todoNewForm'); // show create new komentar form
Route::post('/todo', 'Todo@save')->name('todoCreate'); // process create new komentar
// versi panjang
$a = Route::get('/todo/{id}', 'Todo@detail');
$a->name('todoDetail'); // show detail komentar
Route::get('/todo/delete/{id}', 'Todo@delete')->name('todoDelete'); // deletes komentar

Route::get('/todo/edit/{id}', 'Todo@edit')->name('todoEditForm'); // show komentar edit form
Route::post('/todo/edit/{id}', 'Todo@update')->name('todoUpdate'); // update komentar