@extends('templates.base')

@section('content')
<div class="container">
	<div >
        {!! Form::model($infraccion, ['route' => ['infraccion.update', $infraccion->id], 'method' => 'PATCH']) !!}  
            @include('partials.infraction')
		{!! Form::close() !!}
	</div>    
</div>
@endsection
