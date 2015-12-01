$(document).on('click', 'a.btn-delete', function(e) {
    var x = confirm("Deseas eliminar un registro?");
    var token = $('meta[name="csrf-token"]').attr('content');    
    var url =  $(this).attr('href');
    if (x) {
        event.preventDefault();
        $.ajax({            
            url:   url,            
            type:  'delete',   
            data: { _token: token},  
            success: function(respuesta){
                window.location.href = "infraccion";
            },                      
            error:function(xhr,err){ 
                alert('Elemento no puede ser eliminado');
            }
        });
        
    }
    else {
        event.preventDefault();
        return false;
    }
});