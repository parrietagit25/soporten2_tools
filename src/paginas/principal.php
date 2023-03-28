<?php session_start(); ?>
<?php if(!isset($_SESSION['tools']['id_user'])){

        header('Location: paginas/salir.php');  

} ?>
<?php include 'reusables/cabezera.php'; ?>
<div class="container-sm">
<?php include('reusables/menu.php'); ?>
    <div class="container">
    <h2 class="mt-5" style="color:black">Soporte N2 Tools</h2>
    <p class="mt-4">Esta aplicación web tiene como objetivo documentar y consultar posibles casos del día a día como soporte N2, 
    también como consola de lanzamiento/ejecución de automatización de procesos.</p>
    </div>
</div>

<?php include 'reusables/pie.php'; ?>