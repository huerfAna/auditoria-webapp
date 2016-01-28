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
    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }
	public function anexo22()
    {
        return $this->belongsTo('App\Anexo22');
    }
    public function results()
    {
        return $this->hasMany('App\Result');
    }
    public function isValid($data)
    {  	
    	$tamanio = 0;      
        $valor = 1;   
        if($data['entrada'] == 1)       
            $campo = 'pk_referencia';
        else
            $campo = 'folio_ds';
        
        $consulta = \DB::connection('users')->table($data['tabla'])->where($campo,$data['referencia'])->get();        
        if($consulta != null)
        {
            foreach ($consulta as $query) 
            {

                //============================== Validaciones ================================	
                if($data['attr_id'] == 5)
                {
                    if($query->$data['campos'] == '')
                     $valor = 0;
                }
                if($data['attr_id'] == 3 || $data['anx_id'] == 1)
                {
                    $campo = explode(",",$data['campos']);                        
                    if($data['attr_id'] == 3)
                    {
                        for($i=0; $i<count($campo); $i++)
                        {
                            $tamanio += strlen($query->$campo[$i]);
                        }
                        if($tamanio != $data['data_val'])
                	        $valor = 0;
                    }
                    else
                    {                            
                        $campos = $campo[0];
                    }
                }
                if($data['attr_id'] == 7 || $data['attr_id'] == 1 || $data['attr_id'] == 6)
                {
                	$catalogo = explode("|",$data['data_val']);
                    $tablaval = $catalogo[0];
                    $campoval = $catalogo[1];
                    Session::put('tablacat',$tablaval);
                    if($data['attr_id'] == 1)
                    {  
                        $camope = Anexo22::find(2)->relationships->where('origin_id',$data['entrada'])->first();                                                      
         	            $opera = $camope->field;
                        $valopera = $query->$opera;
                        $val_campo = Catalog::where($campoval,$query->$data['campos'])->where('operacion',$valopera)->count();                           
                    }
                	if($data['attr_id'] == 6)
                    {
                        $formula = explode(',', $catalogo[1]);
                        $campobd = $formula[0];
                        $operador = $formula[1];
                        $result = $formula[2];
                        $camposwh = Anexo22::find($result)->relationships->where('origin_id',$data['entrada'])->first();                  
                        $campowh = explode(',', $camposwh->field);                                                       
                        $val_campo = Catalog::where($catalogo[2],'LIKE','%'.$query->$data['campos'].'%')->where($campobd,$query->$campowh[0])->count();                               
                    }                                                    
                    if($data['attr_id'] == 7)
                    {
                        $campo = explode(',',$data['campos']);
                        $campocat = $campo[0];
                        $val_campo = Catalog::where($campoval,$query->$campocat)->count();                    
                    }
                    
                    if($val_campo == 0)
                        $valor = 0;
                } 
                if($data['attr_id'] == 4)
                {
                    $camposval = explode(",", $data['data_val']);
                    $valanexo = Anexo22::find($camposval[0]);
                    $campanx = $valanexo->a22_field;                        
                    if($query->$campanx != $camposval[1])
                        $valor = 0;
                } 
                if($data['attr_id'] == 9)
                {
                    //$camposval = explode(",", $data['campos']);
                    $valores = explode("|", $data['data_val']);
                    $identif = $valores[1];
                    $docum = $valores[0];      

                    $documentos = \DB::connection('users')->table('opauimg')->where('pk_referencia',$data['referencia'])->where('imgtipodoc',$docum )->count();
                    if($query->$data['campos'] != $identif && $documentos == 0)
                        $valor = 0;                    
                }

            }
        }
        return $valor;
        
    }
}
