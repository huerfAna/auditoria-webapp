$("#attr").change(function () {
    $( "#data_1" ).empty();
    var valattr = $('#attr option:selected').val();
    if(valattr == 1)
    {
        var token =  $('input[name="_token"]').val();
        $.ajax({
            dataType: "JSON",                
            url:   '../catalogos',
            data: { _token: token, attr: valattr},
            type:  'post',                
            success: function(respuesta){                    
                var sel = $('<select onchange="getFields()" id="table" class="input">').appendTo('#data_1');
                sel.append($("<option>").attr('value', '0').text('Selecciona...'));
                $.each( respuesta, function( i, tabla ){
                    sel.append($("<option>").attr('value',tabla.name).text(tabla.name));
                }); 
            },
            error:function(xhr,err){ 
                alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
            }
        });        
    }
    if(valattr == 2)
        $( "#data_1" ).append( "<select name='dato' class='input'><option value='0'>Seleccione...</option><option value='1'>Numerico</option><option value='2'>Texto</option></select>" );
    if(valattr == 3)
        $( "#data_1" ).append( "<input type='number' class='input'>" );
    if(valattr == 5)
        $( "#data_1" ).append( "<input type='checkbox' class='input'>Obligatorio");
    if(valattr == 6 || valattr == 7) 
    {
        var token =  $('input[name="_token"]').val();
        $.ajax({
            dataType: "JSON",                
            url:   '../catalogos',
            data: { _token: token},
            type:  'post',                
            success: function(respuesta){                    
                var sel = $('<select onchange="getFields()" id="table" class="input">').appendTo('#data_1');
                sel.append($("<option>").attr('value', '0').text('Selecciona...'));
                $.each( respuesta, function( i, tabla ){
                    sel.append($("<option>").attr('value',tabla.name).text(tabla.name));
                }); 
            },
            error:function(xhr,err){ 
                alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
            }
        });
    }        
});    

//Obtener campos de la tabla seleccionada
function getFields()
{
    var attr = $('#attr option:selected').val();
        
    $("#table option:selected").each(function () {
        $( "#data_2" ).empty();
        var table = $(this).text();
        var token =  $('input[name="_token"]').val();
        $.ajax({
            dataType: "JSON",                
            url:   '../campos',
            data: { _token: token, table: table, attr: attr},
            type:  'post',                
            success: function(respuesta){
                var sel1 = $('<select class="input" name="field1">').appendTo('#data_2');                    
                sel1.append($("<option>").attr('value', '0').text('Selecciona...'));
                $.each(respuesta.campos, function( i, campo ){
                    sel1.append($("<option>").attr('value',campo.name).text(campo.name));
                }); 
                if(attr == 6)
                    newComparation(respuesta);                        
            },
            error:function(xhr,err){ 
                alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
            }
        });
    });                       
}  

function newComparation(respuesta)
{
    $( "#data_3" ).empty();
    var sel2 = $('<select class="input" name="field2">').appendTo('#data_3');
    sel2.append($("<option>").attr('value', '0').text('Selecciona...'));
    $.each( respuesta.campos, function( i, campo ){
        sel2.append($("<option>").attr('value',campo.name).text(campo.name));
    });
    $( "#data_3").append( "<select name='opera' class='input'><option value='1'> < </option><option value='2'> > </option><option value='3'> <= </option><option value='4'> >= </option><option value='5'> = </option></select>" );
    var sel3 = $('<select class="input" name="field3">').appendTo('#data_3');
    sel3.append($("<option>").attr('value', '0').text('Selecciona...'));
    $.each( respuesta.camposanx, function( i, campo ){
        sel3.append($("<option>").attr('value',campo.name).text(campo.name));
    });
}

$('#button').click(function(){
    var result = '';
    element = $('.input');
    $.each(element, function(){
        result += $(this).val()+'|';
    });
    $('#data').val(result.substring(0,result.length - 1));
});
