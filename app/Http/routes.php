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
Route::get('resultados', ['as' => 'results', 'uses' => 'AuditController@getResult']);

Route::resource('validacion', 'ValidationController',['only' => ['index', 'store','destroy','show']]);
Route::post('catalogos', 'ValidationController@getTables');
Route::post('campos', 'ValidationController@getFields');
Route::post('tipoDocumento', 'ValidationController@getDocument');

Route::resource('infraccion','InfractionController',['except' => ['show']]);
Route::resource('solucion','SolutionController');

