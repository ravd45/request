$('#btn_iniciar').click(function() {
	usuario = $('#user').val();
	pass = $('#pass').val();
	ruta = base_url + 'Welcome/login';
	$.ajax({
		url: ruta,
		type: 'POST',
		dataType: 'json',
		data: {usuario:usuario, pass:pass},

	})
	.done(function(data) {
		console.info(data);
		$('#msj').html(data.datos);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
	});
	
});