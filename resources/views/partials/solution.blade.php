	<div class="form-group">				
		{!! Form::label('solution', 'Solución') !!}<br>
		{!! Form::textarea('sol_description', null,['rows' => 2]) !!}<br>
		{!! Form::label('observa', 'Observaciones') !!}<br>
		{!! Form::textarea('sol_observation', null,['rows' => 2]) !!}<br>	
		@if(isset($document))
			@if($document == 1)			
				{!! Form::file('document') !!}<br>			
			@endif
		@endif
		@if(session('document') == 1)			
			{!! Form::file('document') !!}<br>			
		@endif
		{!! Form::submit('Guardar') !!}
	</div>	