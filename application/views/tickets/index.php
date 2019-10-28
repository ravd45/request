			<input type="text" hidden id="idusuario" value="<?=$datos_usuario[0]['idusuario']?>">
			<div class="container">
				<div class="row">

					<div class="col-sm-3">
						<select id="desarrollador" class="custom-select custom-select-lg mb-3">
							<option value="0" selected disabled>Seleccione un desarrollador</option>
							<?php foreach ($usuarios as $key => $values) { ?>
								<option value="<?= $values['idusuario']?>"><?=$values['nombre']?> <?=$values['paterno']?> <?=$values['materno']?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-sm-3">
						<select id="proyecto" class="custom-select custom-select-lg mb-3">
							<option value="0" selected disabled>Seleccione un proyecto</option>
						</select>
					</div>

					<div class="col-sm-6">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Solicitud</span>
							</div>
							<textarea class="form-control" id="ticket" aria-label="With textarea"></textarea>
						</div>
					</div>
				<!-- <div class="col-sm-2 input-field">
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
				</div> -->
				<div class="col-sm-1 offset-sm-11">
					<button id="btn_enviar" type="button" class="btn btn-outline-info">Guardar</button>
					<!-- <a class="btn-floating amber darken-2 tooltipped" data-position="bottom" data-tooltip="Guardar" title="Guardar"><i class="material-icons">save</i></a> -->
				</div>
				<div class="col-sm-12 input-field">
					<table class="table">
						<thead class="thead-dark">
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
										<td>
											<?php switch ($value['estado']) {
												case '0': ?>
												<i class="material-icons text-danger" title="Sin iniciar">star_border</i>
												<?php break;
												case '1': ?>
												<i class="material-icons text-warning" title="En proceso">star_half</i>
												<?php break;
												case '2': ?>
												<i class="material-icons text-success" title="Terminado">star</i>
												<?php break;
											} ?>
										</td>
										<td><a id="btn_detalles" onclick="detalles(<?= $value['idticket']?>)" class="btn btn-sm btn-secondary modal-trigger tooltipped" data-position="right" data-tooltip="Ver detalles"  title="Ver detalles" href="#detalles_modal"><i class="material-icons">list</i></a></td>
									</tr>
								<?php }
							}?>
						</tbody>

					</table>
				</div>
			</div>	</div>

			<!-- Modal Structure -->
			<div class="modal" id="detalles_modal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Detalles</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div id="detalles_div"></div>
						</div>
						<div class="modal-footer">
							<button type="button" id="cerrar_mod" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
			<script src="<?= base_url('assets/js/index/index.js'); ?>"></script>