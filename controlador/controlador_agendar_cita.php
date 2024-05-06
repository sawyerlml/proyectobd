<?php
    if(!empty($_POST["btnagendar"])){
        if(!empty($_POST["txtnombre"]) and !empty($_POST["txtapellido"]) and !empty($_POST["txtusuario"]) and !empty($_POST["txtfecha_hora"])and !empty($_POST["txtdireccion"]) and !empty($_POST["txtmaterial"])) {
           
           $nombre=$_POST["txtnombre"]; 
           $apellido=$_POST["txtapellido"];
           $usuario=$_POST["txtusuario"];   
           $fecha_hora=$_POST["txtfecha_hora"];
           $direccion=$_POST["txtdireccion"];
           $material=$_POST["txtmaterial"];

           //consulta sql                      
            $sql=$conexion->query("Select count(*) as 'total' from citas where fecha_hora='$fecha_hora' ");//sentencia sql
            if($sql->fetch_object()->total > 0){ ?>
             <script>
            $(function notification(){
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"La cita el <?= $fecha_hora ?> ya esta programada",
                    styling:"bootstrap3"
                })
            })
        </script>
        <?php } else {
            $agendar=$conexion->query("insert into citas(nombre,apellido,usuario,fecha_hora,direccion,material) values('$nombre','$apellido','$usuario','$fecha_hora','$direccion','$material')");
        if($agendar==true){ ?>
            <script>
            $(function notification(){
                new PNotify({
                    title:"CORRECTO",
                    type:"success",
                    text:"La cita se ha registrado correctamente",
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
                    text:"Error al agendar la cita",
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
