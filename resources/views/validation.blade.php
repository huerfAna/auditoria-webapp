<header>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</header>
<div class="container">
	<div>
		{!! Form::open() !!}
            {!! Form::label('Campo Anexo22') !!}<br>
		    {!! Form::select('anexo22_id', $campos, null) !!}<br>
            {!! Form::label('Atributo') !!}<br>
            {!! Form::select('attr_id', $atributo, null,['id' => 'attr']) !!}<br>
            <div class="data">                
                <strong>Validaciones</strong><br>
                {!! Form::text('data',null) !!}<br>
            </div>
		    {!! Form::submit('Crear') !!}
		{!! Form::close() !!}
	</div>
</div>
<script type="text/javascript">
    $("#attr" ).change(function () {
        var valattr = $('#attr option:selected').val();
        if(valattr == 1)
            $( ".data" ).append( "<select name='opera'><option value='1'>Importación</option><option value='2'>Exportación</option></select>" );
        if(valattr == 2)
            $( ".data" ).append( "<select name='dato'><option value='1'>Numerico</option><option value='2'>Texto</option></select>" );
        if(valattr == 3)
            $( ".data" ).append( "<input type='number'>" );
        if(valattr == 5)
            $( ".data" ).append( "<input type='checkbox'>Obligatorio");
        if(valattr == 6 || valattr == 7 || valattr == 8) 
        {
            var token =  $('input[name="_token"]').val();
            $.ajax({
                dataType: "",                
                url:   '../catalogos',
                data: { _token: token},
                type:  'post',                
                success: function(respuesta){
                    (respuesta.name);
                },
                error:function(xhr,err){ 
                    alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
                }
            })

        }
    });
</script>

