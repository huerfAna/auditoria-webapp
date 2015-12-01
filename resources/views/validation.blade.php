@extends('templates.base')

@section('content')
<div class="container">
	<div >
		{!! Form::open(['route' => 'validacion.store', 'id' => 'form'])!!}
            {!! Form::label('Campo Anexo22') !!}<br>
		    {!! Form::select('anexo22_id', $campos, session('id'),['id' => 'anx']) !!}<br>
            {!! Form::label('Atributo') !!}<br>
            {!! Form::select('attribute_id', $atributo, null,['id' => 'attr']) !!}<br>            
            {!! Form::hidden('val_data',null,['id' => 'data']) !!}<br>
            <br><br>
            <div style="background-color:#eee; width:400px"> 
                <strong>Crea tu validacion</strong><br>                
                <div id="data_1"></div>
                <div id="data_2"></div>                        
                <div id="data_3"></div>                        
            </div>
		    {!! Form::button('Agregar',['id' => 'button']) !!}
		{!! Form::close() !!}
	</div>    
    <div id="table"></div>   
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="{{ asset('js/validations.js') }}"></script>
@endsection  
