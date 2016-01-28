<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Solution;
use App\Result;
use App\Validation;
use App\Http\Requests\SolutionRequest;
use Illuminate\Routing\Route;


class SolutionController extends Controller
{
	protected $request; 

	public function index()
	{
		$solutions = Solution::join('aud_results','results_id','=','aud_results.id')
		->select('aud_solutions.id as id','aud_solutions.id','res_referen','sol_description','sol_observation','res_document','res_status')->get();
		
		return view('solutions')->with('soluciones',$solutions);
	}
	public function create(SolutionRequest $request)
	{
		$result = Result::find($request->res);
		$document = $result->res_document;

		return redirect()->back()->with(['id'=>$request->res, 'document' => $document]);		

	}
	public function store(SolutionRequest $request)
	{
		Solution::create($request->except('document'));
		Solution::insertDocument($request);

		return redirect()->back();			
	}
	public function edit($id)
	{
		$solucion = Solution::find($id);
		$result = Result::find($solucion->results_id);
		$document = $result->res_document;
		
		return view('edit_solution')->with(['solucion' => $solucion,'document' => $document]);				
	}
	public function update(SolutionRequest $request,$id)
	{
		$solucion = Solution::find($id);
		$solucion->fill($request->except('document'));
		$solucion->save();	
		Solution::insertDocument($request);
		
		return redirect()->route('solucion.index');
	}
	public function show($id)
	{
		$detalle = Result::join('aud_validations','aud_results.validations_id','=','aud_validations.id')
			->select('attribute_id')->where('aud_results.id',$id)->first();		
		
		return redirect()->back()->with('detalle',$detalle);
	}
	public function destroy($id)
	{
		$solucion = Solution::find($id);
		$solucion->delete();
		$result = Result::find($solucion->results_id);
		$result->res_status = 0;
		$result->save();

		return 'Elemento eliminado';
	}


	
}