<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Contacto</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="../js/mapaContacto.js"></script>
</head>

<body>
    <header>
        <nav id="menu">
            <div id="menuIzquierda">
                <img class="elementoMenu" id="logoHeader" src="../media/logos/logoWhite.png" />
                <h3>
                    <a class="elementoMenu" id="h3Menu" href="../index.php">Protectora</a>
                </h3>
            </div>
            <div id="menuDerecha">
                <?php
                session_start();
                if (isset($_SESSION["userID"])) {
                    echo "<form id='formCerrarSesion' action='../modules/cerrarSesion.php' method='post'>
                        <button type='submit' id='btnCerrarSesion' value='btnCerrarSesion' class='elementoMenu'>Cerrar sesión</button>
                </form>";
                } else {
                    echo '<a class="elementoMenu" id="inicioSesionA" href="../public/register.php">Registrarse</a>
                          <a class="elementoMenu" id="registerA" href="../public/login.php">Login</a>';
                }
                ?>
            </div>
        </nav>
    </header>
    <section>
        <div id="menuContainer">
            <a class="menuLink" href="../public/adopciones.php">Adopciones</a>
            <a class="menuLink" href="../public/donaciones.php">Donaciones</a>
            <a class="menuLink" href="../public/noticias.php">Noticias</a>
            <a class="menuLink" href="../public/contacto.php">Contacto</a>
        </div>
    </section>
    <div>
        <h1>Donaciones</h1>
        <div>
            <p>Desde Protectora Tesi aceptamos todo tipo de donaciones</p>
            <p>Recogemos vienes como alimentos, ropa, juguetes, etc en nuestra propio edificio</p>
            <p>Ademas si quiere realizar una donacion monetaria la puede realizar con el siguiente formulario</p>
        </div>
        <?php

        if (isset($_SESSION["userID"])) {
            echo '
            <form action="../modules/insertarDonacion.php" method="post">

                <label for="ipusuario">IP del usuario:</label>
                <input type="text" id="ipusuario" name="ipusuario" required><br>

                <label for="monto">Monto:</label>
                <input type="number" id="monto" name="monto" min="1" max="999999" required><br>

                <input type="submit" value="Donar">
            </form>
            ';
        } else {
            echo "<p>Por favor, se quere realizar </p>";
        }


        ?>
        <form action="../modules/insertarDonacion.php" method="post">

            <label for="ipusuario">IP del usuario:</label>
            <input type="text" id="ipusuario" name="ipusuario" required><br>

            <label for="monto">Monto:</label>
            <input type="number" id="monto" name="monto" min="1" max="999999" required><br>

            <input type="submit" value="Donar">
        </form>
    </div>
    <footer id="footer-index">
        <div id="social">
            <a>
                <img id="twitter" src="../media/social/instagram.svg" alt="twitter" />
            </a>
            <a>
                <img id="instagram" src="../media/social/tiktok.svg" alt="instagram" />
            </a>
            <a>
                <img id="tiktok" src="../media/social/twitter.svg" alt="tiktok" />
            </a>
        </div>
    </footer>
    <button class="scroll-top-btn hidden">&#11014;</button>
    <script src="../js/scrollTopBtn.js"></script>
</body>

</html>