<?php session_start(); ?>
<?php $mensaje = ''; ?>
<?php if(!isset($_SESSION['tools']['id_user'])){

        header('Location: paginas/salir.php');  

} ?>
<?php include '../controlador/ControrReglas.php'; ?>
<?php 

if (isset($_POST['registro_regla'])) {
    $registro_regla = new ReglasControlador();
    $mensaje = $registro_regla->registroRegla();
}

?>
<?php include 'reusables/cabezera.php'; ?>
<div class="container-sm">
<?php include('reusables/menu.php'); ?>
    <div class="container">
        <div class="container mt-5">
            <?php echo $mensaje; ?>
            <br>
            <h2>Modulo de registro de Reglas y ver las Reglas registradas</h2>
            <br>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#registrarCaso">Registrar Regla</button>
            <br>
            <!-- Modal -->
            <div class="modal fade" id="registrarCaso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Regla</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputNombreCaso"> <b> Nombre de la regla</b></label>
                                <input type="text" class="form-control" id="inputNombreCaso" name="nombre_regla" placeholder="Ingrese el nombre del caso">
                            </div>
                            <div class="form-group">
                                <label for="inputDescripcion"><b>Descripción</b></label>
                                <textarea class="form-control" id="inputDescripcion" rows="6" name="descripcion_regla"></textarea>
                            </div>
                            <br>
                                <!--<button type="submit" class="btn btn-primary">Guardar</button>-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="registro_regla">Registrar</button>
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
                        <th>Usuario R.</th>
                        <th>Nombre de la regla</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ver_reglas = new ReglasControlador();
                          $ver_reglas->verReglas();
                          foreach ($ver_reglas->verReglas() as $key => $value) {
                          ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['nombre'].' '.$value['apellido']; ?></td>
                        <td><?php echo $value['nombre_regla']; ?></td>
                        <td><?php echo $value['fecha']; ?></td>
                        <td><button class="btn btn-primary" style="margin-right:5px;">Editar</button> <button class="btn btn-primary">Ver</button></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Usuario R.</th>
                        <th>Nombre de la regla</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php include 'reusables/pie.php'; ?>