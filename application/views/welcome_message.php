<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tickets</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/materialize.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="<?= base_url('assets/js/messages.js') ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</head>
<body>
	<nav>
		<div class="nav-wrapper light-green">
			<a href="#" class="brand-logo right">Tickets - QualEdu</a>
		</div>
	</nav>
	
	<div class="row" id="login">
		<div class="col s8 offset-s4">
			<div class="input-fields col s6">
				<label for="user">Usuario</label>
				<input  id="user" type="text" class="validate">
				<label for="pass">Contraseña</label>
				<input  id="pass" type="password" class="validate">
				<span style="color:red;" id="msj"></span>
			</div>
			<div class="col s2 offset-s6">
				<a id="btn_iniciar" class="btn-floating amber darken-2 btn tooltipped" data-position="bottom" data-tooltip="Iniciar Sesión" title="Iniciar Sesión"><i class="material-icons">done</i></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12" id="index_div"></div>
	</div>

	  <footer class="page-footer  light-green">
          <div class="footer-copyright">
            <div class="container">
            © 2019 Copyright QualEdu
            <a class="grey-text text-lighten-4 right" href="www.qual-edu.org">Qual-Edu</a>
            </div>
          </div>
        </footer>
            
	
	<script >var base_url = "<?= base_url();?>index.php/"</script>
	<script src="<?= base_url('assets/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/materialize.js'); ?>"></script>
	<script src="<?= base_url('assets/js/login/login.js'); ?>"></script>
</body>
</html>