<div id="form-create">
	<div class="panel-body">
		{!! Form::open(['route' => 'solucion.store', 'method' => 'POST', 'files' => true]) !!}
			{!! Form::hidden('results_id',session('id')) !!}<br>				
			@include('partials.solution')
		{!! Form::close() !!}
	</div>
</div>
