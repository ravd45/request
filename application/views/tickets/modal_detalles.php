<div class="row">
    <div class="col s12">
        <div class="col s12">
            <table class="centered striped">
                <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Encargado</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Termino</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tabla as $key => $value) { ?>
                        <tr>
                            <td><?= $value['detalle']?></td>
                            <td><?= $value['nombre']?></td>
                            <td><?= $value['fechaInicio']?></td>
                            <td><?= $value['fechaTermino']?></td>
                            <td>
                                <?php switch ($value['estado']) {
                                    case '0': ?>
                                    <?php if($value['idusuario']==$_SESSION['id'] || $value['tipo_usuario'] == 1 || $value['tipo_usuario'] == 2){ ?><a class="btn-floating white" onclick="cambiarestado(1)"><?php } ?><i class="material-icons red-text">star_border</i></a>
                                    <?php break;
                                    case '1': ?>
                                    <?php if($value['idusuario']==$_SESSION['id'] || $value['tipo_usuario'] == 1 || $value['tipo_usuario'] == 2){ ?><a class="btn-floating white" onclick="cambiarestado(2)"><?php } ?><i class="material-icons yellow-text">star_half</i></a>
                                    <?php break;
                                    case '2': ?>
                                    <?php if($value['idusuario']==$_SESSION['id'] || $value['tipo_usuario'] == 1 || $value['tipo_usuario'] == 2){ ?><a class="btn-floating white" onclick="cambiarestado(0)"><?php } ?><i class="material-icons green-text">star</i></a>
                                    <?php break;
                                } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="col s8 offset-s4">
                <div class="col s6">
                    <label for="observacion">Observación
                       <input type="text" id="observacion"></label>
                       <span style="color:red;" id="error_lb"></span>
                       <input type="text" id="idticketInput" hidden>
                   </div>
                   <div class="col s6">
                       <a id="btn_observacion" class="btn-floating amber darken-2"><i class="material-icons">edit</i></a>
                   </div>
               </div>
               <table class="centered striped">
                <thead>
                    <tr>
                        <th>Observacion</th>
                        <th>Observador</th>
                        <th>fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($observaciones as $key => $value) { ?>
                        <tr>
                            <td><?= $value['observacion']?></td>
                            <td><?= $value['observador']?></td>
                            <td><?= $value['fecha']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/index/modal.js'); ?>"></script>