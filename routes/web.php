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
    return redirect()->to('trabajador');
});

Route::get('/trabajador',         				['middleware' => [], 'as' => 'home',       			'uses' => 'App\Http\Controllers\TrabajadorController@index']);
Route::get('trabajador/', 						['middleware' => [], 'as' => 'trabajador.index', 	'uses' => 'App\Http\Controllers\TrabajadorController@index']);
Route::get('trabajador/load/', 					['middleware' => [], 'as' => 'trabajador.load', 	'uses' => 'App\Http\Controllers\TrabajadorController@load']);
Route::get('trabajador/create', 				['middleware' => [], 'as' => 'trabajador.create',	'uses' => 'App\Http\Controllers\TrabajadorController@create']);
Route::post('trabajador/store', 				['middleware' => [], 'as' => 'trabajador.store', 	'uses' => 'App\Http\Controllers\TrabajadorController@store']);
Route::get('trabajador/edit/{trabajador}',		['middleware' => [], 'as' => 'trabajador.edit', 	'uses' => 'App\Http\Controllers\TrabajadorController@edit']);
Route::patch('trabajador/update/{trabajador}',	['middleware' => [], 'as' => 'trabajador.update', 	'uses' => 'App\Http\Controllers\TrabajadorController@update']);
Route::delete('trabajador/delete/{trabajador}', ['middleware' => [], 'as' => 'trabajador.delete',  	'uses' => 'App\Http\Controllers\TrabajadorController@destroy']);
Route::get('trabajador/show/{trabajador}',      ['middleware' => [], 'as' => 'trabajador.show',    	'uses' => 'App\Http\Controllers\TrabajadorController@show']);


Route::get('cargo/', 					['middleware' => [], 'as' => 'cargo.index', 	'uses' => 'App\Http\Controllers\CargoController@index']);
Route::get('cargo/load/', 				['middleware' => [], 'as' => 'cargo.load', 		'uses' => 'App\Http\Controllers\CargoController@load']);
Route::get('cargo/create', 				['middleware' => [], 'as' => 'cargo.create',	'uses' => 'App\Http\Controllers\CargoController@create']);
Route::post('cargo/store', 				['middleware' => [], 'as' => 'cargo.store', 	'uses' => 'App\Http\Controllers\CargoController@store']);
Route::get('cargo/edit/{cargo}',		['middleware' => [], 'as' => 'cargo.edit', 		'uses' => 'App\Http\Controllers\CargoController@edit']);
Route::patch('cargo/update/{cargo}',	['middleware' => [], 'as' => 'cargo.update', 	'uses' => 'App\Http\Controllers\CargoController@update']);
Route::delete('cargo/delete/{cargo}', 	['middleware' => [], 'as' => 'cargo.delete',  	'uses' => 'App\Http\Controllers\CargoController@destroy']);
Route::get('cargo/show/{cargo}',      	['middleware' => [], 'as' => 'cargo.show',    	'uses' => 'App\Http\Controllers\CargoController@show']);

Route::get('proyecto/', 					['middleware' => [], 'as' => 'proyecto.index', 	'uses' => 'App\Http\Controllers\ProyectoController@index']);
Route::get('proyecto/load/', 				['middleware' => [], 'as' => 'proyecto.load', 	'uses' => 'App\Http\Controllers\ProyectoController@load']);
Route::get('proyecto/create', 				['middleware' => [], 'as' => 'proyecto.create',	'uses' => 'App\Http\Controllers\ProyectoController@create']);
Route::post('proyecto/store', 				['middleware' => [], 'as' => 'proyecto.store', 	'uses' => 'App\Http\Controllers\ProyectoController@store']);
Route::get('proyecto/edit/{proyecto}',		['middleware' => [], 'as' => 'proyecto.edit', 	'uses' => 'App\Http\Controllers\ProyectoController@edit']);
Route::patch('proyecto/update/{proyecto}',	['middleware' => [], 'as' => 'proyecto.update', 'uses' => 'App\Http\Controllers\ProyectoController@update']);
Route::delete('proyecto/delete/{proyecto}', ['middleware' => [], 'as' => 'proyecto.delete', 'uses' => 'App\Http\Controllers\ProyectoController@destroy']);
Route::get('proyecto/show/{proyecto}',      ['middleware' => [], 'as' => 'proyecto.show',   'uses' => 'App\Http\Controllers\ProyectoController@show']);

Route::get('tipos_pagos/list/',             ['middleware' => [], 'as' => 'tipos_pagos/list','uses' => 'App\Http\Controllers\TrabajadorController@tiposPagos']);
Route::get('tipos_cambios/list/{tipo_pago}',['middleware' => [], 'as' => 'tipos_cambios/list','uses' => 'App\Http\Controllers\TrabajadorController@tiposCambios']);//1ra. opcion
//Route::get('tipos_cambios/list/',['middleware' => [], 'as' => 'tipos_cambios/list','uses' => 'App\Http\Controllers\TrabajadorController@tiposCambios']);//2da. opcion