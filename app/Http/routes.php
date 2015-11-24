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
Route::get('resultados', ['as' => 'resultados', function(App\Result $result)
{		
	$resultado = $result::all();
	return view('results')->with('result', $resultado);
	
}]);