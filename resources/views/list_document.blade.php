@extends('templates.base')

@section('content')
	<ul>		
		{!! Form::open(['route' => ['expedientes.update',$referen], 'method'=>'PATCH', 'id' => 'form'])!!}
		@foreach($document as $doc)			
			<li>{{ $doc->chk_document }}</li>
			<li>				
				{!! Form::hidden('chk_document',$doc->chk_document) !!}
				
				@if($doc->chk_status == 1)		
					{!! Form::radio('chk_status'.$doc->id, '1', true) !!}Si {!! Form::radio('chk_status'.$doc->id, '0') !!}NO {!! Form::radio('chk_status'.$doc->id, '2') !!}No se requiere
				@endif
				@if($doc->chk_status_status == 0)
					{!! Form::radio('chk_status'.$doc->id, '1') !!}Si {!! Form::radio('chk_status'.$doc->id, '0',true) !!}NO {!! Form::radio('chk_status'.$doc->id, '2') !!}No se requiere
				@endif
				@if($doc->chk_status_status == 2)
					{!! Form::radio('chk_status'.$doc->id, '1') !!}Si {!! Form::radio('chk_status'.$doc->id, '0') !!}NO {!! Form::radio('chk_status'.$doc->id, '2',true) !!}No se requiere
				@endif
			</li>				
		@endforeach
		{!! Form::submit('Guardar') !!}				
	{!! Form::close() !!}
	</ul>
@endsection
