<div id="form-create" style="display:none">
	<div class="panel-body">
		{!! Form::open(['route' => 'solucion.store', 'method' => 'POST']) !!}
			<div class="form-group">
				{!! Form::hidden('results_id',$res->id) !!}<br>
				{!! Form::label('solution', 'Solución') !!}<br>
				{!! Form::textarea('sol_description', null,['rows' => 2]) !!}<br>
				{!! Form::label('observa', 'Observaciones') !!}<br>
				{!! Form::textarea('sol_observation', null,['rows' => 2]) !!}<br>
				{!! Form::submit('Guardar') !!}
			</div>	
		{!! Form::close() !!}
	</div>
</div>
