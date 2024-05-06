<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Cargo de Usuario</title>
</head>
<body>
    <h1>Cargo de Usuario</h1>
    <?php
    // Iniciar sesión si no ha sido iniciada
    if (!session_id()) {
        session_start();
    }

    // Incluir el archivo que contiene la función obtener_cargo_usuario()
    require_once "./layout/funciones.php";

    // Debug: Mostrar todos los errores y advertencias
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    // Llamar a la función y mostrar el resultado del cargo del usuario
    echo "Cargo del usuario: " . obtener_cargo_usuario();

    // Imprimir el ID de usuario en sesión si está disponible
    if(isset($_SESSION['id_usuario'])) {
        echo "<br>ID de usuario en sesión: " . $_SESSION['id_usuario'];
    } else {
        echo "<br>No hay usuario en sesión.";
    }
    ?>
</body>
</html>
