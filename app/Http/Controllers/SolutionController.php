<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Solution;
use App\Result;
use App\Http\Requests\SolutionRequest;
use Illuminate\Routing\Route;


class SolutionController extends Controller
{
	protected $request; 

	public function __construct()
	{
		$this->beforeFilter('@findSolution', ['only' => ['edit','update']]);		
	}
	public function findSolution(Route $route)
	{
		$this->solucion = Solution::where('results_id',$route->getParameter('solucion'))->first();
	}
	
	public function store(SolutionRequest $request)
	{
		Solution::create($request->all());
		$result = Result::find($request->results_id);
		$result->res_status = 1;
		$result->save();
	
		return redirect()->back();
	}
	public function edit($id)
	{
		$solucion = Solution::find($id);
		return redirect()->back()->with(['solucion' => $this->solucion]);
	}

	
}