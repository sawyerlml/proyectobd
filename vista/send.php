<?php

include "../modelo/conexion.php";

// Verificar si se ha enviado el formulario
if(isset($_POST['send'])){
    // Realizar la consulta a la base de datos
    if(
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['phone']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['message']) >= 1
    ){
        // Obtener los valores del formulario
        $name = trim($_POST['name']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $message = trim($_POST['message']);

        // Crear la consulta SQL
        $consulta = "INSERT INTO Qys(Nombre, Telefono, Correo, Mensaje)
                     VALUES ('$name','$phone','$email','$message')";

        // Ejecutar la consulta
        $resultado = mysqli_query($conexion, $consulta);

    }
}

?>
