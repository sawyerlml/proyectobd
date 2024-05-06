<?php

    session_start();
   if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
       header('location:login/login.php');
   }

?>

<style>
      ul li:nth-child(2) .activo{
        background: rgb(11, 150, 214) !important;
      }
</style>


<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">VISITAS RECOLECCION</h4>

    <?php
    
include "../modelo/conexion.php";
include "../controlador/controlador_eliminar_visita.php";

$sql = $conexion->query("SELECT
visitas.id_visita,
empleado.nombre AS nom_empleado,
cargo.nombre AS nombre_cargo,
citas.nombre AS nombre_cita,
visitas.id_cita,
visitas.usuario,
visitas.fecha_hora,
visitas.direccion,
visitas.material
FROM
visitas
INNER JOIN empleado ON visitas.id_empleado = empleado.id_empleado
INNER JOIN cargo ON empleado.cargo = cargo.id_cargo
INNER JOIN citas ON visitas.id_cita = citas.id_cita");

?>

<table class="table table-border table-hover col-12" id="example">
    <thead>
        <tr>
            <th scope="col">ID_VISITA</th>
            <th scope="col">NOMBRE EMPLEADO</th>
            <th scope="col">CARGO</th>
            <th scope="col">NOMBRE USUARIO</th>
            <th scope="col">ID_CITA</th>
            <th scope="col">USUARIO</th>
            <th scope="col">FECHA Y HORA</th>
            <th scope="col">DIRECCIÓN</th>
            <th scope="col">MATERIAL</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($datos=$sql->fetch_object()) {
        ?>
        <tr>
            <td><?= $datos->id_visita ?></td>
            <td><?= $datos->nom_empleado ?></td>
            <td><?= $datos->nombre_cargo ?></td>
            <td><?= $datos->nombre_cita ?></td>
            <td><?= $datos->id_cita ?></td>
            <td><?= $datos->usuario ?></td>
            <td><?= $datos->fecha_hora ?></td>
            <td><?= $datos->direccion ?></td>
            <td><?= $datos->material ?></td>
            <td>
                <a href="visitas.php?id=<?= $datos->id_visita ?>" onclick="advertencia(event)" class="btn btn-danger"> <i class="fa-solid fa-trash-can"> </i> </a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>


</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>