@extends('templates.base')
@section('content')
<div class="container">
	<div >
            <a href="{{ route('infraccion.create') }}">Nuevo</a>
		<table>
                  <thead>
                        <td>ID</td>
                        <td>Infracción</td>
                        <td>Sancion</td>
                        <td>Multa</td>
                  </thead>
                  @foreach($data as $inf)
                        <tr>
                              <td>{{ $inf->id}}</td>
                              <td>{{ $inf->inf_fundament}}</td>
                              <td>{{ $inf->inf_sanfundament}}</td>
                              @if($inf->inf_valmax > 0)
                                    <td>{{ $inf->inf_valmin }} a {{ $inf->inf_valmax}}</td>
                              @else
                                    <td>{{ $inf->inf_fine }}</td>
                              @endif
                              <td><a href="{{ route('infraccion.edit',$inf->id) }}">Editar</a></td>
                              <td><a href="{{ route('infraccion.destroy', $inf->id) }}" class="btn-delete">Eliminar</a></td>
                        </tr>
                  @endforeach                  
                  <tbody></tbody>                  
            </table>
	</div>    
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="{{ asset('js/infraction.js') }}"></script>
@endsection  