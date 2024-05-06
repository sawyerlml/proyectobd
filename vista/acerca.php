<?php
session_start(); // Inicia la sesión al principio del archivo

// Verifica si el usuario no ha iniciado sesión y redirige al formulario de inicio de sesión
if (empty($_SESSION['nombre']) && empty($_SESSION['apellido'])) {
    header('location:login/login.php');
    exit(); // Termina el script para evitar que se procese más contenido
}
?>

<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<style>
    ul li:nth-child(6) .activo{
        background: rgb(11, 150, 214) !important;
    }
</style>

</div>

<?php 
// Incluir el contenido de index.php
include('index.php');
?>

<?php require('./layout/footer.php'); ?>
