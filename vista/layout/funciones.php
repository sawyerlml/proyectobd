<?php
// Función para obtener el cargo del usuario actual desde la base de datos
function obtener_cargo_usuario() {
    // Establecer la conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "root", "ecocyclehubbd");

    // Verificar si hay errores en la conexión
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Iniciar la sesión PHP si no está iniciada
    if (!session_id()) {
        session_start();
    }

    // Verificar si la variable de sesión 'id_usuario' está definida y no es null
    if (!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])) {
        // Si 'id_usuario' no está definido o está vacío, devuelve un valor por defecto o maneja el error según tu lógica de la aplicación
        // En este ejemplo, se devuelve un valor por defecto de 0
        $conexion->close();
        return 0;
    }

    // Preparar la consulta para obtener el cargo del usuario actual
    $consulta = "SELECT id_cargo FROM usuario WHERE id_usuario = " . $_SESSION['id_usuario'];

    // Ejecutar la consulta
    $resultado = $conexion->query($consulta);

    // Verificar si la consulta fue exitosa
    if ($resultado === false) {
        die("Error en la consulta: " . $conexion->error);
    }

    // Obtener el resultado de la consulta
    $fila = $resultado->fetch_assoc();

    // Cerrar la conexión a la base de datos
    $conexion->close();

    // Devolver el cargo del usuario
    return $fila ? $fila['id_cargo'] : 0;
}


?>