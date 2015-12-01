<?php namespace App\Http\Controllers;

use App\Validation;
use App\Anexo22;
use App\Data;
use App\Catalog;
use App\Infraction;
use App\Sanction;
use App\Result;
use Input;
use DB;
use Session;
use App\Http\Controllers\Controller;


class AuditController extends Controller
{
    /**
     *
     * @return Response
     */

    public function run()
    {
        $fechaini = Input::get('fechaini');
        $fechafin = Input::get('fechafin');
        $origen = Input::get('entrada');          
        //===========================================================
        $data = new Data();
        $validacion = new Validation();
        $valorOrigen = $data->getDataOrigen($origen);
        $referencias = $data->getRecords($fechaini,$fechafin,$valorOrigen['fecha']);
        if($referencias != false)
        {
            foreach ($referencias as $referen)
            {       
                $pk_referencia = $referen->pk_referencia;
                $anexo = Anexo22::all();             
                foreach ($anexo as $anx)
                {       
                    foreach ($anx->validations as $val)
                    {                                                    
                            $valid = $val->id ;
                            $camposbd = $anx->relationships->where('origin_id',$valorOrigen['entrada'])->first();                      
                            $data = [
                                "tabla"     => $camposbd->table,
                                "campos"    => $camposbd->field,
                                "id_val"    => $val->attr_id,
                                "data_val"  => $val->val_data,
                                "anx_id"    => $anx->id,
                                "entrada"   => $valorOrigen['entrada']
                            ];
                            $valor = $validacion->getValidation($referen,$data);
                            if($valor == 0)
                            {
                                $datos = [
                                    "res_referen" => $pk_referencia,
                                    "validations_id"  => $valid                           
                                ];
                                Result::firstOrNew($datos);                                                        
                            }                 
                    }                                   
                }
            }  
            return  redirect()->route('results');  
        }
        else
        {
           return redirect()->back()->with('error', 'No se encontraron referencias.');
        }            
    }
    public function getResult()
    {
        $resultado = Result::all();
        return view('results')->with('result', $resultado);    
    }
}