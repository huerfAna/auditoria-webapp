@extends('templates.base')

@section('content')
    <h1>Resultados de la Auditoría <a class="target-help"><i class="icon icon-speechbubble34"></i></a></h1> 
    <section class="row">
        @foreach($result as $res)
        {{-- */ $anx = $res->validations->anexo22; /*--}} 
            <div class="medium-6 columns">
                <div class="cute-alert">
                    <div>
                        <i class="icon icon-round icon-warning5"></i>
                    </div>
                    <div>
                        <span class="field">{{ $anx->a22_name }}</span>    
                        <span class="error">{{ $anx->infractions->inf_description }}</span> 
                        <span class="fine">{{ $anx->infractions->sanctions->san_valmax }}</span> 
                    </div>
                </div>
            </div>
        @endforeach  
    </section>
@endsection

@section('help')
    @include('partials.help-results')
@endsection