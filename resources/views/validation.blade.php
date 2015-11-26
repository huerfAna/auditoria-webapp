@extends('templates.base')

@section('content')
<div class="container">
	<div >
		{!! Form::open(['url' => 'guardar/validacion'])!!}
            {!! Form::label('Campo Anexo22') !!}<br>
		    {!! Form::select('anexo22_id', $campos, null) !!}<br>
            {!! Form::label('Atributo') !!}<br>
            {!! Form::select('attr_id', $atributo, null,['id' => 'attr']) !!}<br>            
            {!! Form::hidden('val_data',null,['id' => 'data']) !!}<br>
            <br><br>
            <div style="background-color:#eee; width:400px"> 
                <strong>Crea tu validacion</strong><br>                
                <div id="data_1"></div>
                <div id="data_2"></div>                        
                <div id="data_3"></div>                        
            </div>
		    {!! Form::submit('Agregar',['id' => 'button']) !!}
		{!! Form::close() !!}
	</div>
    @if(session()->has('data'))
        <div id="table">
            <strong>{{ session('campo') }}</strong>
            <table>
                <thead>
                    <td>Atributo</td>
                    <td>Valor</td>
                </thead>
                <tbody>
                    @foreach (session('data') as $val)
                        <tr>
                            <td>
                                {{ $val->attribute_id }}                              
                            </td>
                            <td>{{ $val->val_data  }}</td>
                        </tr>
                    @endforeach
                </tbody>            
            </table>
        </div>
    @endif
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="{{ asset('js/validations.js') }}"></script>
@endsection  
