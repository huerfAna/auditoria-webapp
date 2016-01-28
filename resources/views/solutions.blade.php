@extends('templates.base')

@section('content')
   <table>
         <thead>
            <td>Referencia</td>
            <td>Solucion</td>                        
            <td>Observaciones</td>
            <td>Documentos</td>
            <td></td>
        </thead>                  
        <tr>
            @foreach($soluciones as $solu)
            <td>{{ $solu->res_referen }}</td>
            <td>{{ $solu->sol_description }}</td>
            <td>{{ $solu->sol_observation }}</td>
            @if($solu->res_document == 1 && $solu->res_status == 1)
                <td>1</td>
            @else
                <td>0</td>
            @endif
            <td><a href="{{ route('solucion.edit',$solu->id) }}">Editar</a>|<a href="{{ route('solucion.destroy', $solu->id) }}" class="btn-delete">Eliminar</a></td>
            
            @endforeach                  
        </tr>
    </table>     
@endsection
@section('help')
    @include('partials.help-results')
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="{{ asset('js/delete_field.js') }}"></script>
@endsection  