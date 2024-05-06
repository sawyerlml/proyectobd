<?php
// Agrega aquí el código para obtener el cargo del usuario
require_once __DIR__ . '/funciones.php';

$cargo_usuario = obtener_cargo_usuario();
?>

<nav class="side-menu">
    <ul class="side-menu-list p-0">
        <?php
        // Mostrar menús comunes a todos excepto al usuario normal (cargo 7)
        if ($cargo_usuario != 7) {
            echo '
                <li class="red">
                    <a href="inicio.php" class="activo">
                        <img src="../public/img-inicio/asistencia.png" class="img-inicio" alt="">
                        <span class="lbl">ASISTENCIA</span>
                    </a>
                </li>
                <li class="red">
                    <a href="visitas.php" class="activo">
                        <img src="../public/img-inicio/recolector.png" class="img-inicio" alt="">
                        <span class="lbl">VISITAS</span>
                    </a>
                </li>
                <li class="red">
                    <a href="usuario.php" class="activo">
                        <img src="../public/img-inicio/team.png" class="img-inicio" alt="">
                        <span class="lbl">USUARIOS</span>
                    </a>
                </li>
            ';
        }

        // Menús para todos los usuarios, incluidos los de cargo 7
        echo '
            <li class="red">
                <a href="citas.php" class="activo">
                    <img src="../public/img-inicio/programar.png" class="img-inicio" alt="">
                    <span class="lbl">CITAS</span>
                </a>
            </li>
            <li class="red">
                <a href="acerca.php" class="activo">
                    <img src="../public/img-inicio/info.png" class="img-inicio" alt="">
                    <span class="lbl">ACERCA DE</span>
                </a>
            </li>
        ';
        ?>
    </ul>
</nav>
