 $(document).ready(function(){
 	$('.sidenav').sidenav();
 	$('select').formSelect();
 	$('input#input_text, textarea#textarea2').characterCounter();
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