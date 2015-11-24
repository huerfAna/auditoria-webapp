<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

/** 
   ******************
   * Validaciones
   ******************
 **/
class Validation extends Model  {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aud_validations';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected  $guarded = ['id','created_at','updated_at'];

	public function anexo22()
    {
        return $this->belongsTo('App\Anexo22');
    }
    public function getValidation($referen,$data)
    {  	
    	$tamanio = 0;      
        $valor = 1;                         
        //============================== Validaciones ================================	
        if($data['id_val'] == 5)
        {
            if($referen->$data['campos'] == '')
  		       	$valor = 0;
        }
        if($data['id_val'] == 3 || $data['anx_id'] == 1)
        {
            $campo = explode(",",$data['campos']);                        
            if($data['id_val'] == 3)
            {
                for($i=0; $i<count($campo); $i++)
                {
                    $tamanio += strlen($referen->$campo[$i]);
                }
                if($tamanio != $data['data_val'])
        	        $valor = 0;
            }
            else
            {                            
                $campos = $campo[0];
            }
        }
        if($data['id_val'] == 7 || $data['id_val'] == 1 || $data['id_val'] == 6)
        {
        	$catalogo = explode("|",$data['data_val']);
            $tablaval = $catalogo[0];
            $campoval = $catalogo[1];
            Session::put('tablacat',$tablaval);
            if($data['id_val'] == 1)
            {  
                $camope = Anexo22::find(2)->relationships->where('origin_id',$data['entrada'])->first();                                                      
 	            $opera = $camope->field;
                $valopera = $referen->$opera;
                $val_campo = Catalog::where($campoval,$referen->$data['campos'])->where('operacion',$valopera)->count();                           
            }
        	if($data['id_val'] == 6)
            {
                $formula = explode(',', $catalogo[1]);
                $campobd = $formula[0];
                $operador = $formula[1];
                $result = $formula[2];
                $camposwh = Anexo22::find($result)->relationships->where('origin_id',$data['entrada'])->first();                  
                $campowh = explode(',', $camposwh->field);                                                       
                $val_campo = Catalog::where($catalogo[2],'LIKE','%'.$referen->$data['campos'].'%')->where($campobd,$referen->$campowh[0])->count();                               
            }                                                    
            if($data['id_val'] == 7)
             	$val_campo = Catalog::where($campoval,$referen->$data['campos'])->count();                               
            
            if($val_campo == 0)
                $valor = 0;
        } 
        if($data['id_val'] == 4)
        {
            $camposval = explode(",", $data['data_val']);
            $valanexo = Anexo22::find($camposval[0]);
            $campanx = $valanexo->a22_field;                        
            if($referen->$campanx != $camposval[1])
                $valor = 0;
        }   
        return $valor;     
    }

}
