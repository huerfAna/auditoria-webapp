@extends('templates.base')
@section('content')
<div id="form-update" >	
	<div class="panel-body">		
		{!! Form::model($solucion, ['route' => ['solucion.update', $solucion->id], 'method' => 'PATCH','files' => true]) !!}  			
			{!! Form::hidden('results_id',null) !!}<br>				
			@include('partials.solution')
		{!! Form::close() !!}		
	</div>
</div>
@endsection

