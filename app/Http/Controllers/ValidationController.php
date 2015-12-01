<?php 

namespace App\Http\Controllers;

use App\Validation;
use App\Anexo22;
use App\Attribute;
use App\Http\Controllers\Controller;
use Input;
use Response;
use App\Http\Requests\ValidationRequest;
use Illuminate\Routing\Route;

class ValidationController extends Controller
{
    /**
     *
     * @return Response
     */
    protected $request;

    public function index()
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
            $camposanx = \DB::table('aud_anexo22')->select('id','a22_name as name')->get(); 
        }
        $campos = \DB::table('INFORMATION_SCHEMA.COLUMNS')->select('COLUMN_NAME as name')->where('TABLE_NAME',$tabla)->get();
        return \Response::json(['campos' => $campos,'camposanx' => $camposanx]);
    }
    public function store(ValidationRequest $request)
    {
        Validation::create($request->all());
        
        return redirect()->back()->with(['id' => $request->anexo22_id]); 

    }
    public function show($anx)
    {
        $anexo = Anexo22::where('id',$anx)->first();                     
        $validaciones = $anexo->validations()->where('anexo22_id',$anx)->get();        
        
       return $validaciones; 
        
    }
    public function destroy($id)
    {
        $validacion = Validation::find($id);
        $anexo = $validacion->anexo22_id;
        $result = Validation::destroy($id);

        return Response::json($anexo);
        
    }
}