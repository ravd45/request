	<?php //Utilerias::imprimeConsola($datos_usuario); ?>
	<div class="row">
		<div class="input-field">
			<input type="text" hidden id="idusuario" value="<?=$datos_usuario[0]['idusuario']?>">
			<input type="text" hidden value="<?=$datos_usuario[0]['nombre']?>">
			<input type="text" hidden value="<?=$datos_usuario[0]['puesto']?>">
		</div>
		<div class="col s12">
			<div class="col s4 input-field ">
				<select id="desarrollador">
					<option value="0" selected disabled>Seleccione un desarrollador</option>
					<option value="2">Alejandro Martínez</option>
					<option value="1">Aracely Velázquez</option>
					<option value="3">Eloisa Hidalgo</option>
				</select>
			</div>
			<div class="col s6 input-field">
				<textarea id="ticket" class="materialize-textarea" data-length="1500"></textarea>
				<label for="ticket">Solicitud</label>
			</div>
			<div class="col s2 input-field">
				<form action="#">
					<div class="file-field input-field">
						<div class="btn amber darken-2">
							<span>File</span>
							<input type="file" multiple>
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text" placeholder="Upload one or more files">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col s12 offset-s11">
			<a id="btn_enviar" class="btn-floating amber darken-2"><i class="material-icons">save</i></a>
		</div>
		<div class="col s12 input-field">
			<table class="centered responsive-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Solicitante</th>
						<th>Ticket</th>
						<th>Desarrollador a cargo</th>
						<th>Fecha de Solicitud</th>
						<th>Estatus</th>
						<th>Detalles</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($tabla == null) { ?>
						<tr>
							<td colspan="7">No hay datos para mostrar</td>
						</tr>
					<?php } else { ?>
					<?php $i = 0; foreach ($tabla as $key => $value) { $i++;?>
						<tr>
							<td><?=$i?></td>
							<td><?=$value['solicitante']?></td>
							<td><?=$value['detalle']?></td>
							<td><?=$value['nombre']?></td>
							<td><?=$value['fechaPeticion']?></td>
							<td><?=$value['estado']?></td>
							<td><a id="btn_detalles" class="btn-floating amber darken-2"><i class="material-icons">list</i></a></td>
						</tr>
					<?php }
					     }?>
				</tbody>

			</table>
		</div>
	</div>	
	<script src="<?= base_url('assets/js/index/index.js'); ?>"></script>