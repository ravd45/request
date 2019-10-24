 $(document).ready(function(){
 	$('.sidenav').sidenav();
 	$('select').formSelect();
 	$('input#input_text, textarea#textarea2').characterCounter();
 	$('.modal').modal();
 });
 
 $('#btn_enviar').click(function() {
 
    desarrollador = $('#desarrollador option:selected').val();
    detalle = $('#ticket').val();
    solicitante = $('#idusuario').val();
    ruta = base_url + 'Welcome/set_tabla';
       console.log('click click');
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
 	.done(function() {
 		console.log("success");
 	})
 	.fail(function() {
 		console.log("error");
 	})
 	.always(function() {
 		console.log("complete");
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
 	})
 	.fail(function() {
 		console.log("error");
 	})
 	.always(function() {
 		console.log("complete");
 	});
 	
 }

 function observacion(ticket) {
 	console.log(ticket);
 }