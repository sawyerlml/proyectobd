<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header class="header">

        <div class="menu container">
            <a href="#" class="logo">Logo</a>
            <input type="checkbox" id="menu"/>
            <label for="menu">
                <img src="Imagenes/menu.png" class="menu-icono" alt="Menu">
            </label>
                <nav class="navbar">
                <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Nosotros</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </nav>
            </div>
            <div class="header-content container">
            <div class="header-txt">
                <h1>ECOCYCLEHUB</h1>
                <p>ECOCYCLEHUB es una empresa que esta alineada a los ideales del cuidado ambiental.
                La cual se encarga de la recoleccion de residuos, entre ellos se encuentran materiales de
                uso cotidiano como: plastico, vidirio, papel, carton, cobre, madera, metales, etc.
                
                </p>
                <a href="#" class="btn-1">Informacion</a>
            </div>
            <div clas="header-img">
                <img src="Imagenes/Imagen1.png" alt="">
            </div>
        </div>

    </header>

    <section class="about container">

        <div class="about-img">
            <img src="Imagenes/Imagen 2.png" alt="">
        </div>
        <div class="about-txt">
            <h2>Nosotros</h2>
            <p>Somos una empresa de caracter ambiental, uestra empresa se dedica a transformar la manera en que las ciudades gestionan sus residuos. 
                A través de nuestra innovadora aplicación, estamos capacitando a los ciudadanos para que se conviertan en agentes de cambio en la lucha por un futuro más limpio y sostenible.
                Juntos, podemos hacer una diferencia significativa en la salud de nuestro planeta y en la calidad de vida de las generaciones futuras.</p>
            <p></p>
        </div>
        </div>

    </section>

    <main class="servicios">
        <h2>Servicios</h2>
        <div class="servicios-content container">

            <div class="servicio-1">
                <i class=""></i>
                <h3>Recoleccion</h3>
            </div>
            <div class="servicio-1">
                <i class=""></i>
                <h3>Transporte</h3>
            </div>
            <div class="servicio-1">
                <i class=""></i>
                <h3>Acopio</h3>
            </div>
            <div class="servicio-1">
                <i class=""></i>
                <h3>Confinamiento</h3>
            </div>
        </div>
    </main>



    <section class="formulario container">

        <form method="post" autocomplete="off">

            <h2>Quejas y Sugerencias</h2>

            <div class="input-group">

                    <div class="input-container">
                        <input type="text" name="name" placeholder="Nombre y Apellido">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-container">
                        <input type="text" name="phone" placeholder="Telefono">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" placeholder="Correo">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <div class="input-container">
                       <textarea name="message" placeholder="Detalles"></textarea>
                    </div>

                    <input type="submit" name="send" class="btn" onClick="myFunction()">
            </div>

        </form>
    </section>

    <footer class="footer">

        <div class="footer-content container">

            <div class="link">
                <a href="#" class="logo">Logo</a>
            </div>
            <div class="link">
                <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contacto</a></li>
                </ul>
            </div>

        </div>
    </footer>

    <?php

        include("send.php");
    
    ?>

    <script>
        function myFunction(){
            window.location.href="http://localhost/PaginaBD"
        }
    </script>

</body>
</html>