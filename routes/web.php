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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'BackController@index')->name('index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/new-todo', 'TodoController@index')->name('add');
Route::post('store',['as' => 'todo.store', 'uses' => 'TodoController@insert']);


Route::get('/edit-todo/{id}', 'TodoController@edit')->name('edit');
Route::post('update',['as' => 'todo.update', 'uses' => 'TodoController@update']);


Route::post('destroy','TodoController@destroy')->name('destroy');

Route::post('markAsCompleted','TodoController@markAsCompleted')->name('markAsCompleted');;

