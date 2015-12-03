@extends('templates.base')

@section('content')
    <h1>Resultados de la Auditoría <a class="target-help"><i class="icon icon-speechbubble34"></i></a></h1> 
    <section class="row">
        @foreach($result as $res) 
            <strong>{{ $res->res_referen }}</strong><br>     
            <div class="medium-6 columns">
                <div class="cute-alert">
                    <div>
                        <i class="icon icon-round icon-warning5"></i>
                    </div>
                    <div>
                        <span class="field">{{ $res->a22_name }}</span>    
                        <span class="error">{{ $res->inf_description }}</span> 
                        <span class="fine">{{ $res->inf_valmax }}</span> 
                        <span>{{ $res->res_status}}</span> 
                        @if($res->res_status == 0)
                            <a href="" class="show-form-create">Solventar</a>                        
                        @else
                            <a href="{{ route('solucion.edit', $res->idsol) }}" >Solventar</a>                        
                        @endif

                    </div>
                </div>
            </div>            
        @endforeach  
    </section>
    <section>
        @include ('new_solution') 
        @if(isset($solucion))
            @include('edit_solution')
        @endif
        
    </section>    
@endsection
@section('help')
    @include('partials.help-results')
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.show-form-create').click(function(e){
            e.preventDefault();
            $('#form-create').toggle('fast');
        });  
     

    });
</script>
@endsection