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

//Users
Route::get('/', function () {
    return redirect()->to('user');
});


Route::get('/user',         			['middleware' => [], 'as' => 'home',       		'uses' => 'App\Http\Controllers\UserController@index']);
Route::get('user/', 					['middleware' => [], 'as' => 'usuario.index', 	'uses' => 'App\Http\Controllers\UserController@index']);
Route::get('user/load/', 				['middleware' => [], 'as' => 'usuario.load', 	'uses' => 'App\Http\Controllers\UserController@load']);
Route::get('user/create', 				['middleware' => [], 'as' => 'usuario.create',	'uses' => 'App\Http\Controllers\UserController@create']);
Route::post('user/store', 				['middleware' => [], 'as' => 'usuario.store', 	'uses' => 'App\Http\Controllers\UserController@store']);
Route::get('user/edit/{usuario}',		['middleware' => [], 'as' => 'usuario.edit', 	'uses' => 'App\Http\Controllers\UserController@edit']);
Route::patch('user/update/{usuario}',	['middleware' => [], 'as' => 'usuario.update', 	'uses' => 'App\Http\Controllers\UserController@update']);
Route::delete('user/delete/{usuario}', 	['middleware' => [], 'as' => 'usuario.delete',  'uses' => 'App\Http\Controllers\UserController@destroy']);
Route::get('user/show/{usuario}',      	['middleware' => [], 'as' => 'usuario.show',    'uses' => 'App\Http\Controllers\UserController@show']);