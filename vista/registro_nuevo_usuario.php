<!-- inicio del contenido principal -->
<div class="page-content" style="background-color: #04a1fc; height: 100vh; display: flex; justify-content: center; align-items: center;">

    <div style="background-color: #fff; padding: 20px; border-radius: 10px; width: 80%; max-width: 500px; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h4 style="color: #000; margin-bottom: 20px;">REGISTRAR NUEVO USUARIO</h4>
        
        <?php
            include "../modelo/conexion.php";
            include "../controlador/controlador_registrar_nuevo_usuario.php";
        ?>

        <div class="row">
            <form action="" method="POST">
                <div style="margin-bottom: 15px;">
                    <input type="text" placeholder="Nombre" class="form-control" name="txtnombre" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <input type="text" placeholder="Apellido" class="form-control" name="txtapellido" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <input type="text" placeholder="Usuario" class="form-control" name="txtusuario" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <input type="password" placeholder="Contraseña" class="form-control" name="txtpassword" style="padding: 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                
                <div class="text-center">
                    <a href="./login/login.php" class="btn btn-light mr-2" style="background-color: #ddd; color: #333; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Atrás</a>
                    <button type="submit" value="ok" name="btnregistrarl" class="btn btn-primary" style="background-color: #04a1fc; padding: 10px 20px; border: none; border-radius: 5px; color: #fff;">Registrar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/fontawesome.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

</div>
<!-- fin del contenido principal -->
