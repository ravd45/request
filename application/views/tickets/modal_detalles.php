    <div class="row">
       <!--  <div class="col-sm-12">
        <div class="col-sm-12"> -->
            <table class="table">
                <thead class="thead-dark">
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
                                    <?php if($value['idusuario']==$_SESSION['id'] || $value['tipo_usuario'] == 1 || $value['tipo_usuario'] == 2){ ?><a class="btn btn-sm btn-secondary bg-white" title="Actualizar estado" onclick="cambiarestado(1)"><?php } ?><i class="material-icons text-danger">star_border</i></a>
                                    <?php break;
                                    case '1': ?>
                                    <?php if($value['idusuario']==$_SESSION['id'] || $value['tipo_usuario'] == 1 || $value['tipo_usuario'] == 2){ ?><a class="btn btn-sm btn-secondary bg-white" title="Actualizar estado" onclick="cambiarestado(2)"><?php } ?><i class="material-icons text-warning">star_half</i></a>
                                    <?php break;
                                    case '2': ?>
                                    <?php if($value['idusuario']==$_SESSION['id'] || $value['tipo_usuario'] == 1 || $value['tipo_usuario'] == 2){ ?><a class="btn btn-sm btn-secondary bg-white" title="Actualizar estado" onclick="cambiarestado(0)"><?php } ?><i class="material-icons text-success">star</i></a>
                                    <?php break;
                                } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="col-sm-8 offset-sm-1">
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Observación</span>
                        </div>
                        <input type="text" class="form-control" id="observacion" aria-describedby="basic-addon1">
                    </div>
                       <span style="color:red;" id="error_lb"></span>
                       <input type="text" id="idticketInput" hidden>
                   
                   <div class="offset-sm-11">
                    <button id="btn_observacion" type="button" class="btn btn-outline-info">Guardar</button>
                       
                   </div>
               </div>
               <table class="table">
                <thead class="thead-dark">
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
           <!--  </div>
           </div> -->
       </div>


       <script src="<?= base_url('assets/js/index/modal.js'); ?>"></script>