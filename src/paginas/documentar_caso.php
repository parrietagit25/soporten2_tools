<?php session_start(); ?>
<?php $mensaje = ''; ?>
<?php if(!isset($_SESSION['tools']['id_user'])){

        header('Location: paginas/salir.php');  

} ?>
<?php include '../controlador/Controladores.php'; ?>
<?php 

if (isset($_POST['registro_caso'])) {
    $registro_caso = new CasosControlador();
    $mensaje = $registro_caso->registroCaso();
}

if (isset($_POST['eliminar_caso'])) {
    $eliminar_caso = new CasosControlador();
    $mensaje = $eliminar_caso->eliminarCaso($_POST['eliminar_caso']);
}

?>
<?php include 'reusables/cabezera.php'; ?>
<div class="container-sm">
<?php include('reusables/menu.php'); ?>
    <div class="container">
        <div class="container mt-5">
            <?php echo $mensaje; ?>
            <br>
            <h2>Modulo de registro de casos y ver los casos registrados</h2>
            <br>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#registrarCaso">Registrar Caso</button>
            <br>
            <!-- Modal -->
            <div class="modal fade" id="registrarCaso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Caso</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputNombreCaso"> <b> Nombre del caso</b></label>
                                <input type="text" class="form-control" id="inputNombreCaso" name="nombre_caso" placeholder="Ingrese el nombre del caso">
                            </div>
                            <div class="form-group">
                                <label for="inputNumeroPrograma"><b>Número del programa</b></label>
                                <input type="text" class="form-control" id="inputNumeroPrograma" name="numero_programa" placeholder="Ingrese el número del programa">
                            </div>
                                <div class="form-group">
                                <label for="inputDescripcion"><b>Descripción</b></label>
                                <textarea class="form-control" id="summernote" rows="6" name="descripcion_caso"></textarea>
                            </div>
                                <div class="form-group">
                                <label for="inputAdjuntos"><b>Adjuntos</b></label><br>
                                <input type="file" class="form-control-file" id="inputAdjuntos" name="adjuntos[]" multiple>
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="inputNombreUsuario"><b>Nombre del usuario</b></label>
                                <input type="text" class="form-control" id="inputNombreUsuario" placeholder="Ingrese su nombre" name="nombre_usuario">
                            </div>
                            <br>
                                <!--<button type="submit" class="btn btn-primary">Guardar</button>-->
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="registro_caso">Registrar</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>

            <br>
            <table id="supertabla" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre U.</th>
                        <th>F. Actual</th>
                        <th>Caso</th>
                        <th>Programa</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ver_casos = new CasosControlador();
                          $ver_casos->verCasos();
                          foreach ($ver_casos->verCasos() as $key => $value) {
                          ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['nombre'].' '.$value['apellido']; ?></td>
                        <td><?php echo $value['fecha_reg']; ?></td>
                        <td><?php echo $value['nombre_caso']; ?></td>
                        <td><?php echo $value['numero_programa']; ?></td>
                        <td>
                            <button class="btn btn-warning" style="margin-right:5px;">Editar</button> 
                            <button class="btn btn-primary" style="margin-right:5px;" data-bs-toggle="modal" data-bs-target="#verCaso<?php echo $value['id']; ?>">Ver</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarCaso<?php echo $value['id']; ?>">Eliminar</button>
                        </td>
                    </tr> 

                    <div class="modal fade" id="eliminarCaso<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ver Caso</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3 style="color:red;">Esta seguro que desea eliminar el registro ?</h3>
                            </div>
                            <form action="" method="POST">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                <input type="hidden" name="eliminar_caso" value="<?php echo $value['id']; ?>">
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="verCaso<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ver Caso</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="inputNombreCaso"> <b> Nombre del caso</b></label>
                                        <?php echo $value['nombre_caso']; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNumeroPrograma"><b>Número del programa</b></label>
                                        <?php echo $value['numero_programa']; ?>
                                    </div>
                                        <div class="form-group">
                                        <label for="inputDescripcion"><b>Descripción</b></label>
                                        <?php echo $value['descripcion_caso']; ?>
                                    </div>
                                        <div class="form-group">
                                        <label for="inputAdjuntos"><b>Adjuntos</b></label><br>
                                        
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNombreUsuario"><b>Nombre del usuario</b></label>
                                        <?php echo $value['nombre_usuario']; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNombreUsuario"><b>Registrado por</b></label>
                                        <?php echo $value['nombre'].' '.$value['apellido']; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNombreUsuario"><b>Fecha de Registro</b></label>
                                        <?php echo $value['fecha_reg']; ?>
                                    </div>
                                    <br>
                                        <!--<button type="submit" class="btn btn-primary">Guardar</button>-->
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                                </form>
                            </div>
                        </div>

                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre U.</th>
                        <th>F. Actual</th>
                        <th>Caso</th>
                        <th>Programa</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php include 'reusables/pie.php'; ?>