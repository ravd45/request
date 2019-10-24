 $('#btn_observacion').click(function() {
 	id = $('#idticketInput').val();
 	observacion = $('#observacion').val();
 	idusuario = $('#idusuario').val();
 	if (observacion == '') {
        $('#error_lb').text('La observacion no puede ser vacía');
    }else{
        $('#error_lb').text('');
        ruta = base_url + 'Welcome/set_observacion';
        $.ajax({
         url: ruta,
         type: 'POST',
         dataType: 'json',
         data: {id: id, observacion:observacion, idusuario:idusuario},
     })
        .done(function(data) {
         $('#detalles_div').html(data.str_view);
         $('#idticketInput').val(id);
     })
        .fail(function() {
         console.log("error");
     })
        .always(function() {
         console.log("complete");
     });
    }
});

 function cambiarestado(estado) {
    id = $('#idticketInput').val();
    ruta = base_url + 'Welcome/set_proceso';
     $.ajax({
         url: ruta,
         type: 'POST',
         dataType: 'json',
         data: {estado: estado, id:id},
     })
     .done(function(data) {
        $('#detalles_div').html(data.str_view);
        $('#idticketInput').val(id);
     })
     .fail(function(data) {
         console.log(data);
     })
     .always(function() {
         console.log("complete");
     });
     
 }