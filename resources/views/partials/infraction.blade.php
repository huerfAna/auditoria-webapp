      <strong>Infracción</strong><br>
      {!! Form::label('Infracción') !!}<br>
      {!! Form::textarea('inf_fundament',null,['rows' => 2]) !!}<br>  
      {!! Form::label('Descripción') !!}<br>
      {!! Form::textarea('inf_description',null,['rows' => 2]) !!}<br>   
      <strong>Sanción</strong><br>
      {!! Form::label('Fundamento') !!}<br>            
      {!! Form::textarea('inf_sanfundament',null,['rows' => 2]) !!}<br>
      {!! Form::label('Tipo Multa') !!}<br>
      {!! Form::select('tfine_id', $multas, null) !!}<br>            
      {!! Form::label('Multa') !!}<br>
      {!! Form::text('inf_fine',null) !!}<br>
      {!! Form::label('Valor Multa') !!}<br>
      {!! Form::text('inf_valmin',null) !!}
      {!! Form::text('inf_valmax',null) !!}<br>           
      {!! Form::submit('Guardar') !!}