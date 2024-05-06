<?php 
    session_start();
    session_destroy();
    header("location:/Proyecto_BD/vista/login/login.php");
?>