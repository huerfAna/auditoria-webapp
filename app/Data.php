<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

/** 
   ******************
   * Tablas SECENET
   ******************
 **/
class Data extends Model  
{

 	protected $connection;
 	protected $table;

 	public function __construct()  {
        $this->connection = 'users';
       	$this->table = Session::get('tabla');               
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected  $guarded = ['id','created_at','updated_at'];

	public function getDataOrigen($origen)
	{		
        if($origen == 'on')
        {
            Session::put('tabla', 'optr01');
            $fechap = 'ref_fechapago';
            $entrada = 1;
        }
        else
        {
            Session::put('tabla', 'ds501');
            $fechap = 'FechaPagoReal';
            $entrada = 2;
        }
        $result = [
        	"fecha" => $fechap,
        	"entrada" => $entrada
        ];
        return $result;
	}
	public function getRecords($fechaini,$fechafin,$fechap)
	{
		$referencia = Data::where($fechap,'>=', $fechaini)->where($fechap,'<=', $fechafin)->get()->take(2);        
        if(count($referencia) == 0)
            return false; 
        else
        	return $referencia;
	}
}


 