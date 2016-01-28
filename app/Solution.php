<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
/** 
   ******************
   * Validaciones
   ******************
 **/
class Solution extends Model  {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aud_solutions';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected  $guarded = ['id','created_at','updated_at'];

	public function result()
    {
    	return $this->belongsTo('App\Result');
    }
    
    public static function insertDocument($request)
    {
    	$result = Result::find($request->results_id);		
		$result->res_status = 1;
		$result->save();
		$validacion = Validation::find($result->validations_id);
		$data = explode('|',$validacion->val_data);
		$documento = \Input::file('document');
		$nombre = $result->res_referen.'_'.$data[0];
		$dir = '../../public_html/clientes/ftp/'.Session::get('empresa').'/pdf/';	
		if (null === $documento) 
    		$documento->move($dir, $nombre);

		$nombredoc = \DB::connection('master')->table('mdb_tipodocum')->where('doc_clave',$data[0])->first();
		\DB::connection('users')->table('opauimg')
			->insert(['pk_referencia'=>$result->res_referen,'imgNameFile' => $nombre,'strImageName' => $nombredoc->doc_nombre, 'imgtipo' => 'application/pdf','imgtipodoc' => $data[0]]);			
    }

}
