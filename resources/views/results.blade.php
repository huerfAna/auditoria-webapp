@extends('templates.base')

@section('content')
    <h1>Resultados de la Auditoría <a class="target-help"><i class="icon icon-speechbubble34"></i></a></h1> 
    <section class="row">
        @foreach($result as $res)             
            <div class="medium-6 columns">            
                <div class="cute-alert">
                    <div>
                        <a href="{{ route('solucion.show', $res->idsol) }}" ><i class="icon icon-round icon-warning5"></i></a>
                    </div>
                    <div>
                        <span class="field">{{ $res->res_referen }}</span>
                        <span class="field">{{ $res->a22_name }} : {{ $res->val_description }}</span>    
                        <span class="error">{{ $res->inf_fundament }} - {{ $res->inf_description }}</span>                        
                        @if($res->inf_valmax == 0)
                            <span class="error">{{ $res->inf_fine }}</span>     
                        @else
                            <span class="fine">{{ $res->inf_valmax }}</span>                                                 
                        @endif
                        
                        <a href="{{ route('solucion.create', ['res'=>$res->id]) }}" >Solventar</a>                     
                        
                      
                    </div>                    
                </div>
            </div>      
                
        @endforeach 
    </section>
    <section>     
        @if(session('id'))
            @include('new_solution')        
        @endif      
    </section>    
@endsection
@section('help')
    @include('partials.help-results')
@endsection
