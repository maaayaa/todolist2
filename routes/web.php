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

Route::get('/', 'TodoController@index');
Route::get('/todos/create', 'TodoController@create')->where('todo','[0-9]+');
Route::get('/todos/{todo}', 'TodoController@show');
Route::post('/todos', 'TodoController@store');
Route::get('/todos/{todo}/edit', 'TodoController@edit');
Route::patch('/todos/{todo}', 'TodoController@update');
Route::delete('/todos/{todo}', 'TodoController@destroy');
Route::post('/todos/{todo}/comments', 'CommentsController@store');
Route::delete('/todos/{todo}/comments/{comment}', 'CommentsController@destroy');
