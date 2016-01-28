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
Route::get('login/{empresa}/{usu}', ['as' => 'auditar','uses'=> 'Auth\AuthController@login']);
Route::get('home', function(){
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
Route::resource('result','ResultController');
Route::resource('administracion','AdminController');
Route::resource('expedientes','ListController');



Route::get('creators', function(){
	return view('brand&policy.creators');
});
Route::get('publicidad', function(){
	return view('brand&policy.publicity');
});
Route::get('terminos', function(){
	return view('brand&policy.terms');
});
Route::get('privacidad', function(){
	return view('brand&policy.privacy');
});
Route::get('seguridad', function(){
	return view('brand&policy.security');
});
Route::get('comentarios', function(){
	return view('brand&policy.comments');
});
Route::get('/derechos', function(){
	return view('brand&policy.rights');
});

