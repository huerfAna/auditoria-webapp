<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Result;

class AdminController extends Controller
{
	protected $request;

	public function index(Request $request)
	{
		
		$claves = ['' => '']+\DB::connection('master')->table('mdb_cpedimen')->lists('cpe_clave','cpe_clave');
		$fechas = \DB::connection('users')->table('optr08')->lists('pk_periodo','pk_periodo');
		
		$auditoria = \DB::connection('users')->table('optr01')
		  ->join('optr03','optr01.pk_referencia','=','optr03.pk_referencia')
		  ->where('ref_tipodoc','P')->where('sec_status','!=',1)
		//  ->whereIn('optr01.pk_referencia',Result::select('res_referen')->groupBy('res_referen')->get())
		  ->where('pk_aduana','LIKE','%'.$request->aduana.'%')->where('pk_patente','LIKE','%'.$request->patente.'%')
		  ->where('pk_pedimento','LIKE','%'.$request->pedimento.'%')
		  ->where('ref_clave','LIKE','%'.$request->clave.'%')		 
		  ->where('ref_tipo',$request->operacion)
		  ->whereRaw('YEAR(ref_fechapago) LIKE "%'.$request->anio.'%"')
		  ->whereRaw('MONTH(ref_fechapago)  LIKE "%'.$request->mes.'%"')		  
		  ->orderby('ref_fechapago')->paginate(10);	
		$auditoria->setPath('administracion');
		
		return view('admin_anexo24')->with(['claves' => $claves, 'fechas' => $fechas, 'auditoria' => $auditoria]);			
	}	
	
}