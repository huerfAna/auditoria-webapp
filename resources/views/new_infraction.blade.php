@extends('templates.base')

@section('content')
<div class="container">
	<div >
        {!! Form::open(['route' => ['infraccion.store'], 'method' => 'POST']) !!}  
            @include('partials.infraction')
		{!! Form::close() !!}
	</div>    
</div>
@endsection