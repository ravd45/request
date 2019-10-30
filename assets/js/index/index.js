 $('#btn_enviar').click(function() {

 	desarrollador = $('#desarrollador option:selected').val();
 	detalle = $('#ticket').val();
 	solicitante = $('#idusuario').val();
    ruta_anexo = $('#ruta_anexo').val();
    idproyecto = $('#proyecto option:selected').val();
 	ruta = base_url + 'Welcome/set_tabla';
 	$.ajax({
 		url: ruta,
 		type: 'POST',
 		dataType: 'json',
 		data: {detalle:detalle, desarrollador:desarrollador, solicitante:solicitante, ruta_anexo:ruta_anexo, idproyecto:idproyecto},
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

 	ruta = base_url + 'Welcome/login';
 	$.ajax({
 		url: ruta,
 		type: 'POST',
 		dataType: 'json',
 		data: {x:'x'},

 	})
 	.done(function(data) {
 		location.reload();

 	})
 	.fail(function() {
 		console.log("error");
 	})
 	.always(function() {	
 	});

 	
 });

 function detalles(idticket) {
 	ruta = base_url + 'Welcome/get_detalles';
 	$.ajax({
 		url: ruta,
 		type: 'POST',
 		dataType: 'json',
 		data: {idticket: idticket},
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
