<?php
    if(!empty($_POST["btnregistrar"])){
        if(!empty($_POST["txtnombre"]) and !empty($_POST["txtapellido"]) and !empty($_POST["txtusuario"]) and !empty($_POST["txtpassword"])) {
           $nombre=$_POST["txtnombre"]; 
           $apellido=$_POST["txtapellido"];
           $usuario=$_POST["txtusuario"];  
           $password= md5($_POST["txtpassword"]); 
           //consulta sql                      
            $sql=$conexion->query("Select count(*) as 'total' from usuario where usuario='$usuario' ");//sentencia sql
            if($sql->fetch_object()->total > 0){ ?>
             <script>
            $(function notification(){
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El usuario <?= $usuario ?> ya existe",
                    styling:"bootstrap3"
                })
            })
        </script>
        <?php } else {
            $registro=$conexion->query("insert into usuario(nombre,apellido,usuario,password) values('$nombre','$apellido','$usuario','$password')");
        if($registro==true){ ?>
            <script>
            $(function notification(){
                new PNotify({
                    title:"CORRECTO",
                    type:"success",
                    text:"El usuario se ha registrado correcatamente",
                    styling:"bootstrap3"
                })
            })
        </script>
        <?php } else{ ?>
            <script>
            $(function notification(){
                new PNotify({
                    title:"INCORRECTO",
                    type:"error",
                    text:"Error al registrar usuario",
                    styling:"bootstrap3"
                })
            })
        </script>
        <?php }

            }
        } else { ?>       
        <script>
            $(function notification(){
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"Los campos estan vacios",
                    styling:"bootstrap3"
                })
            })
        </script>
            
    <?php    } ?>
    
    <script>
    setTimeout(() => {
        window.history.replaceState(null, null, window.location.pathname);
    }, 0);

</script>
    
<?php }