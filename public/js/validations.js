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
                var sel = $('<select onchange="getFields()" id="table" class="tabla">').appendTo('#data_1');
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
        $( "#data_1" ).append( "<select name='dato' class='campo'><option value='0'>Seleccione...</option><option value='1'>Numerico</option><option value='2'>Texto</option></select>" );
    if(valattr == 3)
        $( "#data_1" ).append( "<input type='number' class='campo'>" );
    if(valattr == 5)
        $( "#data_1" ).append( "<input type='checkbox' class='campo'>Obligatorio");
    if(valattr == 6 || valattr == 7) 
    {
        var token =  $('input[name="_token"]').val();
        $.ajax({
            dataType: "JSON",                
            url:   '../catalogos',
            data: { _token: token},
            type:  'post',                
            success: function(respuesta){                    
                var sel = $('<select onchange="getFields()" id="table" class="tabla">').appendTo('#data_1');
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
                var sel1 = $('<select name="field1" class="campo">').appendTo('#data_2');                    
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
    var sel2 = $('<select class="campowhr" name="field2">').appendTo('#data_3');
    sel2.append($("<option>").attr('value', '0').text('Selecciona...'));
    $.each( respuesta.campos, function( i, campo ){
        sel2.append($("<option>").attr('value',campo.name).text(campo.name));
    });
    $( "#data_3").append( "<select name='opera' class='opera'><option value='1'> < </option><option value='2'> > </option><option value='3'> <= </option><option value='4'> >= </option><option value='5'> = </option></select>" );
    var sel3 = $('<select class="campoanx" name="field3">').appendTo('#data_3');
    sel3.append($("<option>").attr('value', '0').text('Selecciona...'));
    $.each( respuesta.camposanx, function( i, campo ){
        sel3.append($("<option>").attr('value',campo.id).text(campo.name));
    });
}

$('#button').click(function(){    
    //var attr = $('#attr option:selected').val();
    if($('.tabla').val() == undefined)
        tabla = '';
    else
        tabla = $('.tabla').val() + '|';

    if($('.campo').val() == undefined)
        campo = '';
    else
        campo = $('.campo').val() + '|';

    if($('.campowhr').val() == undefined)
        campowh = '';
    else
        campowh = $('.campowhr').val() + ',';

    if($('.campoanx').val() == undefined)
        campoanx = '';
    else
        campoanx = $('.campoanx').val() + '|';

    if($(".opera option:selected").html() == undefined)
        operador = '';
    else
        operador = $(".opera option:selected").html() +',';

    
    result = tabla+campowh+operador+campoanx+campo;

    $('#data').val(result.substring(0,result.length - 1));
    $( "#form" ).submit();
});
