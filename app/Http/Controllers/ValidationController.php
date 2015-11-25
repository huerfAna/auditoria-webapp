<?php namespace App\Http\Controllers;

use App\Validation;
use App\Anexo22;
use App\Attribute;
use App\Http\Controllers\Controller;


class ValidationController extends Controller
{
    /**
     *
     * @return Response
     */
    public function newValidation()
    {
        $campos = Anexo22::lists('a22_name','id');
        $atributo = Attribute::lists('name','id');

        return view('validation')->with(['campos' => $campos, 'atributo' => $atributo]);  
    }
    public function getTable()
    {
        $tablas = \DB::select("SELECT TABLE_NAME as name FROM INFORMATION_SCHEMA.TABLES where TABLE_NAME LIKE 'mdb%'");
        return \Response::json($tablas);
    }
}