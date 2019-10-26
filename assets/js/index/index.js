 $('#btn_enviar').click(function() {
 
    desarrollador = $('#desarrollador option:selected').val();
    detalle = $('#ticket').val();
    solicitante = $('#idusuario').val();
    ruta = base_url + 'Welcome/set_tabla';
    $.ajax({
        url: ruta,
        type: 'POST',
        dataType: 'json',
        data: {detalle:detalle, desarrollador:desarrollador, solicitante:solicitante},
    })
    .done(function(data) {
        $('#index_div').html(data.str_view);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
 });

 $('#desarrollador').change(function() {
 	desarrollador = $('#desarrollador option:selected').val();

 	ruta = base_url + 'Welcome/get_proyectos';
 	$.ajax({
 		url: ruta,
 		type: 'POST',
 		dataType: 'json',
 		data: {id:desarrollador},
 	})
 	.done(function(data) {
 		$('#proyecto').addClass('col s3 input-field');
 		$('#proyecto').html(data.select);
 	})
 	.fail(function(data) {
 		console.log(data);
 	})
 	.always(function() {
 	});
 	
 });

 $('#btn_cerrar').click(function() {
 	location.reload();
 });

 function detalles(idticket) {
 	ruta = base_url + 'Welcome/get_detalles';
 	$.ajax({
 		url: ruta,
 		type: 'POST',
        dataType: 'json',
 		data: {idticket: idticket},
 		 // beforeSend: function(xhr) {
    //             Notification.loading("");
    //         },
 	})
 	.done(function(data) {
 		$('#detalles_div').html(data.str_view);
 		$('#idticketInput').val(idticket);
        $('#detalles_modal').modal('show');
 	})
 	.fail(function() {
 		console.log("error");
 	})
 	.always(function() {
 		console.log("complete");
 	});
 	
 }
