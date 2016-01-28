@extends('templates.base')
@section('content')
<div class="container">
      <div>
            {!! Form::open(['route' => ['administracion.index'], 'method' => 'GET']) !!}  
                  {!! Form::label('Aduana-Patente-Pedimento') !!}
                  {!! Form::text('aduana',null) !!} - {!! Form::text('patente',null) !!} - {!! Form::text('pedimento',null) !!}<br>
                  {!! Form::label('Clave') !!}
                  {!! Form::select('clave',$claves) !!}
                  {!! Form::label('Tipo Operación') !!}
                  {!! Form::select('operacion',[''=> '',1 => 'Importación',2 => 'Exportación']) !!}
                  {!! Form::select('anio', $fechas) !!}
                  {!! Form::selectMonth('mes',1) !!}
                  {!! Form::submit('Buscar') !!}
            {!! Form::close() !!}
      </div>
	<div >            
		<table>
                  <thead>
                        <td>Aduana</td>
                        <td>Patente</td>                        
                        <td>Pedimento</td>
                        <td>Tipo</td>
                        <td>Fecha Pago</td>
                        <td>Clave</td>
                        <td>GlosaSAT</td>
                        <td>Encabezado</td>
                        <td>Facturas</td>
                        <td>Partidas</td>
                        <td>Inventario</td>
                        <td>Inventario VS Partidas</td>
                        <td>Anexo 24</td>
                        <td>Documental</td>
                        <td>Solventacion</td>                        
                  </thead>                  
                  @foreach($auditoria as $aud)
                        <tr>
                              <td>{{ $aud->pk_aduana}}</td>
                              <td>{{ $aud->pk_patente}}</td>
                              <td>{{ $aud->pk_pedimento}}</td>                              
                              @if($aud->ref_tipo == 1)
                                    <td>IMPORTACION</td>
                              @else
                                    <td>EXPORTACION</td>
                              @endif
                              <td>{{ $aud->ref_fechapago}}</td>
                              <td>{{ $aud->ref_clave}}</td>
                              @if ($aud->ref_sat <= 0)
                                    <td>0</td>
                              @else
                                    <td>1</td>
                              @endif
                              @if (($aud->ref_sat - $aud->ref_preciopag) > 5 || $aud->ref_preciopag == 0)
                                    <td>0</td>
                              @else
                                    <td>1</td>
                              @endif
                              @if (($aud->ref_partidas - $aud->ref_preciopag) > 5 || $aud->ref_facturas == 0)
                                    <td>0</td>
                              @else
                                    <td>1</td>
                              @endif
                              @if (($aud->ref_partidas - $aud->ref_preciopag) > 5 || $aud->ref_partidas == 0)
                                    <td>0</td>
                              @else
                                    <td>1</td>
                              @endif
                              @if (($aud->ref_inventario - $aud->ref_preciopag) > 5 || $aud->ref_inventario == 0)
                                    <td>0</td>
                              @else
                                    <td>1</td>
                              @endif
                               @if ($aud->sec_status == 0)
                                    <td>0</td>
                              @else
                                    <td>1</td>
                              @endif        
                              <?php $referencia = $aud->pk_aduana.'-'.$aud->pk_patente.'-'.$aud->pk_pedimento; ?>
                              <td><a href="{{ route('results',['referen' => $referencia]) }}">Anexo 24</a></td>                              
                              <td><a href="{{ route('expedientes.show',$referencia) }}">Check</a></td>
                              <td></td>
                              
                        </tr>
                  @endforeach                  
                  <tbody></tbody>                  
            </table>            
	</div>    
      <div class="text-center">{!!$auditoria->render()!!}</div>
</div>
@endsection