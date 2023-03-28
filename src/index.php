<?php 
include 'controlador/ControladorLogin.php';
include 'paginas/reusables/cabezera.php';

if (isset($_POST['email']) && isset($_POST['password'])) {

    $login = new Usuario();
    $login->login();
 }
//principal.php
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-12 text-center">
        
        </div>
        <div class="col-md-6 col-sm-12">
        <div class="text-center">
            <img src="img/code.png" width="100" class="img-fluid mt-4" alt="Logo N2 Tools">
            <h2 class="mt-5" style="color:black">Soporte N2 Tools</h2>
            
        </div>
        <form action="" method="post" class="mt-4">
            <label for="email">Email o usuario:</label>
            <input type="text" name="email" id="email" class="form-control" require><br>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" require><br>
            <input type="submit" value="Iniciar sesión" class="btn btn-primary btn-block">
        </form>
        </div>
        <div class="col-md-3 col-sm-12 text-center">
        
        </div>
    </div>
</div>

<?php 
include 'paginas/reusables/pie.php';
?>