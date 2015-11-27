<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('/auditar', 'AuditController@run');
Route::get('resultados', ['as' => 'resultados', 'uses' => 'AuditController@getResult']);
Route::get('crear/validacion', 'ValidationController@newValidation');
Route::post('catalogos', 'ValidationController@getTables');
Route::post('campos', 'ValidationController@getFields');
Route::post('guardar/validacion', 'ValidationController@saveValidation');

Route::get('creators', function(){
	return view('brand&policy.creators');
});