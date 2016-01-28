<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Infraction;
use App\Sanction;
use App\Http\Requests\InfractionRequest;
use Illuminate\Routing\Route;


class InfractionController extends Controller
{
	protected $request;

	public function __construct()
	{
		$this->beforeFilter('@findInfraction', ['only' => ['edit','update']]);
		$this->beforeFilter('@listFines', ['only' => ['create','edit']]);		
	}
	public function findInfraction(Route $route)
	{
		$this->infraccion = Infraction::findOrFail($route->getParameter('infraccion'));
	}
	public function listFines()
	{
		$this->multas = \DB::table('aud_fines')->lists('type','id');
	}
	public function index()
	{
		/*$data = Infraction::leftJoin('aud_sanctions', function($join2) {
      		$join2->on('aud_infractions.sanction_id', '=', 'aud_sanctions.id');
      	})->select('inf_fundament','san_fundament','san_valmin','san_valmax','aud_infractions.id as id')->get();*/
		$data = Infraction::all();

		return view('infractions')->with(["data" => $data]);
	}
	public function create()
	{		
		return view('new_infraction')->with(['multas' => $this->multas]);
	}
	public function edit($id)
	{
		//$infraccion= $this->infraccion;		
		//$sancion = Sanction::find($infraccion->sanction_id);
		return view('edit_infraction')->with(['infraccion' => $this->infraccion,'multas' => $this->multas]);
	}
	public function store(InfractionRequest $request)
	{
		Infraction::create($request->all());
		return redirect()->route('infraccion.index');	
	}
	public function update(InfractionRequest $request, $id)
	{
		$this->infraccion->fill($request->all());
		$this->infraccion->save();	

		//$this->infraccion->sanction()->update($request->except('inf_fundament','inf_description'));		

		return redirect()->route('infraccion.index');	
	}
	public function destroy($id)
	{
		Infraction::destroy($id);
		return 'Elemento eliminado';
	}

	
}