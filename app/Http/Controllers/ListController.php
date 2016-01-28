<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Result;
use App\Validation;
use App\Checklist;
use Session;
use Input;
use App\Http\Requests\ListRequest;


class ListController extends Controller
{
	
	public function show($referen)
	{
		$empresa = Session::get('empresa');
		Checklist::where('chk_referen',$referen)->delete();
		$documentos = \DB::connection('master')->table('mdb_tipodocum')->select('doc_clave','doc_nombre')->get();		
		foreach ($documentos as $doc) 
		{
			$result = Result::where('res_referen', $referen)->first();
			if(!empty($result))
			{
				$validacion = Validation::where('attribute_id',9)->where('id',$result->validations_id)->whereRaw('SUBSTRING_INDEX(val_data, "|", 1) = '.$doc->doc_clave)->count();
				if($validacion > 0)
				{
					$imagen = \DB::connection('users')->table('opauimg')->where('pk_referencia',$referen)->where('imgtipodoc',$doc->doc_clave)->count();
					if($imagen > 0 )
						$check = 1;
					else
						$check = 0;
				}
				else
				{
					$check = 2;
				}
			}
			else
			{
				$check = 0;
			}
			$data = [
				"chk_referen"  => $referen,
				"chk_document" => $doc->doc_nombre,
				"chk_status"   => $check,
				"chk_company"  => $empresa
			];
			Checklist::create($data);
		}
		$result = Checklist::where('chk_company',$empresa)->get();
		return view('list_document')->with(['document'=>$result,'referen'=>$referen]);
	}	
	public function update (ListRequest $request, $referen)
	{	
		//Checklist::where('chk_referen',$referen)->delete();
		//$id = 'chk'.$request->chk_id;		
		
		return $request->all();
	}

}