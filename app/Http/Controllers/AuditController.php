<?php namespace App\Http\Controllers;

use App\Validation;
use App\Anexo22;
use App\Data;
use App\Catalog;
use App\Infraction;
use App\Sanction;
use App\Result;
use App\Solution;
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
                                "id_val"    => $val->attribute_id,
                                "data_val"  => $val->val_data,
                                "anx_id"    => $anx->id,
                                "entrada"   => $valorOrigen['entrada'],
                                "referencia" => $pk_referencia
                            ];
                            $valor = $validacion->getValidation($data);
                            if($valor == 0)
                            {
                                $datos = [
                                    "res_referen" => $pk_referencia,
                                    "validations_id"  => $valid                           
                                ];
                                $totalres = Result::where('res_referen',$pk_referencia)->where('validations_id',$valid)->count();
                                if($totalres == 0)
                                    Result::create($datos);                                                        
                            }                
                           // echo $valor;
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
       
       $resultado = Result::join('aud_validations' , 'aud_results.validations_id' ,'=' , 'aud_validations.id')
            ->join('aud_anexo22' , 'aud_validations.anexo22_id' , '=' , 'aud_anexo22.id')
            ->join('aud_infractions' , 'aud_anexo22.infractions_id' , '=' , 'aud_infractions.id')
            ->leftjoin('aud_solutions' , 'aud_results.id' ,'=' , 'aud_solutions.results_id')
            ->select('aud_solutions.id as idsol','res_referen','aud_results.id as id','a22_name','inf_description','inf_valmax','res_status')
            ->get();
        
        return view('results')->with(['result'=> $resultado]);    
    }
}