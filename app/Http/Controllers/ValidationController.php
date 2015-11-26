<?php 

namespace App\Http\Controllers;

use App\Validation;
use App\Anexo22;
use App\Attribute;
use App\Http\Controllers\Controller;
use Input;


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
        $default = ['0'=>'Seleccione...'];
        $campos = $default + $campos->toArray();
        $atributo = $default + $atributo->toArray();

        return view('validation')->with(['campos' => $campos, 'atributo' => $atributo]);  
    }
    public function getTables()
    {
        $atributo =  Input::get('attr');
        if($atributo == 1)
            $tablas = \DB::table('INFORMATION_SCHEMA.TABLES')->select('TABLE_NAME as name')->where('TABLE_NAME', 'mdb_operacion')->get();
        else
            $tablas = \DB::table('INFORMATION_SCHEMA.TABLES')->select('TABLE_NAME as name')->where('TABLE_NAME', 'LIKE', 'mdb%')->get();
        return \Response::json($tablas);
    }
    public function getFields()
    {
        $camposanx = '';
        $tabla = Input::get('table');
        $atributo = Input::get('attr');
        if($atributo == 6)
        {
            $camposanx = \DB::table('aud_anexo22')->select('a22_name as name')->get(); 
        }
        $campos = \DB::table('INFORMATION_SCHEMA.COLUMNS')->select('COLUMN_NAME as name')->where('TABLE_NAME',$tabla)->get();
        return \Response::json(['campos' => $campos,'camposanx' => $camposanx]);
    }
    public function saveValidation()
    {
        $datos = [
            "anexo22_id" => Input::get('anexo22_id'),
            "attribute_id"    => Input::get('attr_id'),
            "val_data"   => Input::get('val_data')
        ];

        Validation::create($datos);
        
        $anexo = Anexo22::where('id',Input::get('anexo22_id'))->first();                     
        $validaciones = $anexo->validations()->where('anexo22_id',Input::get('anexo22_id'))->get();        
        
        return redirect()->back()->with('data', $validaciones)->with('campo',$anexo->a22_name); 
    }
}