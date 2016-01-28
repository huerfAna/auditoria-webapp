<?php namespace App\Http\Controllers;

use App\Validation;
use App\Anexo22;
use App\Data;
use App\Catalog;
use App\Infraction;
use App\Sanction;
use App\Result;
use App\ResultF;
use App\Solution;
use Input;
use DB;
use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;


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
        //Entrada : SeceNet o Datastage
        $valorOrigen = $data->getDataOrigen($origen);
        $data = new Data();        
        //Pedimentos a revisar
        $referencias = $data->getRecords($fechaini,$fechafin,$valorOrigen['fecha']);
        if($referencias != false)
        {
            foreach ($referencias as $referen)
            {       
                $this->checkPedimento($referen,$valorOrigen);
                
            }
            return  redirect()->route('results');  
        }
        else
        {
           return redirect()->back()->with('error', 'No se encontraron referencias.');
        }      

    }
    public function checkPedimento($referen,$valorOrigen)
    {
        
        if($valorOrigen['entrada'] == 1)
        {
            $pk_referencia = $referen->pk_referencia;
            $tabla = 'optr02';
            $camposel1 = 'pk_factura';
            $camposel2 = 'pk_cove';
            $campow = 'pk_referencia';
        }
        else
        {
            $pk_referencia = $referen->folio_ds;
            $tabla = 'ds505';
            $camposel1 = 'NumeroFactura';
            $camposel2 = 'NumeroFactura';
            $campow = 'folio_ds';
        }

        //Recorrer campos del Anexo 22
        $anexo = Anexo22::all();             
        foreach ($anexo as $anx)
        {       
            //Checar validaciones por campo
            foreach ($anx->validations as $val)
            {                                                    
                $valid = $val->id ;
                $camposbd = $anx->relationships->where('origin_id',$valorOrigen['entrada'])->first();                      
                $data = [
                    "tabla"      => $camposbd->table,
                    "campos"     => $camposbd->field,
                    "attr_id"    => $val->attribute_id,
                    "data_val"   => $val->val_data,
                    "anx_id"     => $anx->id,
                    "entrada"    => $valorOrigen['entrada'],
                    "referencia" => $pk_referencia
                ];
                $validacion = new Validation();    
                $valor = $validacion->isValid($data);                        
                if($valor == 0)
                {
                    if($val->attribute_id == 9)
                        $docum = 1;
                    else
                        $docum = 0;
                              
                    $datos = [
                        "res_referen" => $pk_referencia,
                        "validations_id"  => $valid,
                        "res_document" => $docum,
                        "res_company" => Session::get('empresa'),
                        "res_user"   => Session::get('usuario')
                    ];
                    $totalres = Result::where('res_referen',$pk_referencia)->where('validations_id',$valid)->count();
                    if($totalres == 0)
                        Result::create($datos);                                                      
                }
            }                          
        }     

        $factura = \DB::connection('users')->table($tabla)->where($campow,$pk_referencia)->first();
        $cove = $this->checkCove($factura,$camposel1,$camposel2,$pk_referencia); 
        echo $cove;
                 
    }
    public function checkCove($result,$factura,$cove,$referencia)
    {
        $encab = \DB::connection('users')->table('cove_encabezado')->where('cove_edocument',$result->$factura)->orwhere('cove_edocument',$result->$cove)->first();
        $observa = '';
        if($encab != '')
        {
            $compro = \DB::connection('users')->table('cove_comprobante')->where('pk_item',$encab->pk_item)->first();
            $factura = $compro->inv_factura;
            $fecha = $compro->inv_fecha;
            $moneda = explode('-', $compro->inv_moneda);
            //$factor = $compro->inv_factorme;
            $calle = $result->fac_procalle.' '.$result->fac_procol.' '.$result->fac_proedo.' '.$result->fac_prompo.' '.$result->fac_pais.' '.$result->fac_procp;
            if($encab->pk_tipo == 1)
            {
                $razonfac = $compro->emisor_nombre;
                $callefac = $compro->emisor_calle.' '.$compro->emisor_col.' '.$compro->emisor_localidad.' '.$compro->emisor_mpo.' '.$compro->emisor_edo.' '.$compro->emisor_pais.' '.$compro->emisor_cp; 

            }
            else
            {
                $razonfac = $compro->dest_nombre;
                $callefac = $compro->dest_calle.' '.$compro->dest_col.' '.$compro->dest_localidad.' '.$compro->dest_mpo.' '.$compro->dest_edo.' '.$compro->dest_pais.' '.$compro->dest_cp; 
            }
            $valort = \DB::connection('users')->table('cove_mercancia')->where('inv_item',$encab->pk_item)->groupby('inv_item')->sum('inv_valortotal');
            $valorusd = \DB::connection('users')->table('cove_mercancia')->where('inv_item',$encab->pk_item)->groupby('inv_item')->sum('inv_valorusd');

            if($result->fac_prorazon != $razonfac)
                $observa .= 'Nombre no coincide'."\n";
            if($calle != $callefac)
                $observa .= 'Calle no coincide'."\n";
            if($result->pk_factura != $factura)
                $observa .= 'Factura no coincide'."\n";
            if($result->fac_fecha != $fecha)
                $observa .= 'Fecha no coincide'."\n";
            if($result->fac_moneda != $moneda[0])
                $observa .= 'Moneda no coincide'."\n";       
            if($result->fac_valorme != $valort)
                $observa .= 'Valor no coincide'."\n";       
            if($result->fac_valorusd != $valorusd)
                $observa .= 'Valor USD no coincide'."\n"; 


            ResultF::create(['res_referen' => $referencia,'res_cove' => $encab->cove_edocument,'res_observation' => $observa]);     

        }
        else
        {
            return "COVE no registrado";
        }
    }
    public function getResult(AdminRequest $request)
    {
        if($request->referen != '')
            $referen = '';
        else
            $referen = $request->referen;
        
        $resultado = Result::join('aud_validations' , 'aud_results.validations_id' ,'=' , 'aud_validations.id')
            ->join('aud_anexo22' , 'aud_validations.anexo22_id' , '=' , 'aud_anexo22.id')
            ->join('aud_infractions' , 'aud_anexo22.infractions_id' , '=' , 'aud_infractions.id')
            ->leftjoin('aud_solutions' , 'aud_results.id' ,'=' , 'aud_solutions.results_id')
            ->select('aud_solutions.id as idsol','res_referen','aud_results.id as id','a22_name','val_description','inf_fundament','inf_description','inf_valmax','res_status','inf_fine')
            ->where('res_status',0)->where('res_referen','like','%'.$referen.'%')
            ->orderby('res_referen')
            ->get();
        
        return view('results')->with(['result'=> $resultado]);
        
    }
}