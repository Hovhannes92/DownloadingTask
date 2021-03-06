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

Route::get('/', 'HomeController@home');

Route::get('/tasks', 'TasksController@index');
Route::post('/tasks', 'TasksController@store');
Route::get('/tasks/add', 'TasksController@add');
Route::get('/tasks/{task}/download', 'TasksController@download');
