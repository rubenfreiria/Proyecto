<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Donaciones</title>
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
                // Si el usuario esta logueado muestra el boton de cerrar sesion, si no muestra el boton de login y el de registrarse
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
    <div id="mainDonacion">
        <h1>Donaciones</h1>
        <div>
            <p>Desde Protectora Teis <b>aceptamos todo tipo de donaciones</b></p>
            <p>Recogemos vienes como alimentos, ropa, juguetes, etc en <b><a id="linkContacto"
                        href="../public/contacto.php">nuestro edificio</a></b></p>
            <p>Ademas si quiere realizar una donacion monetaria la puede realizar con el siguiente formulario</p>
        </div>
        <div id="contenidoDonacion">
            <?php
            // Si se ha realizado una donacion con exito muestra un mensaje, si no muestra un mensaje de error
            if (isset($_SESSION["alta_donacion_exitosa"])) {
                echo "<h3 id='mensajeAdopciones'>" . $_SESSION["alta_donacion_exitosa"] . "</h3><p>Muchas Gracias por su aportacion</p>";
                unset($_SESSION["alta_donacion_exitosa"]);
            } else if (isset($_SESSION["error_alta_donacion"])) {
                echo "<h3 id='mensajeAdopciones'>" . $_SESSION["error_alta_donacion"] . "</h3>";
                unset($_SESSION["error_alta_donacion"]); 
            }


            // Si el usuario esta logueado muestra el formulario de donacion, si no muestra un mensaje y los botones de login y registrarse
            if (isset($_SESSION["userID"])) {
                echo '
                        <div id="formularioDonacion">
                        <form action="../modules/insertarDonacion.php" method="post">
                            <label for="cantidadDonacion">Cantidad:</label>
                            <input type="number" id="cantidadDonacion" name="cantidadDonacion" value="€" min="1" max="999999" required><br>
                            <label for="mensajeDonacion">Mensaje:</label>
                            <input type="text" id="mensajeDonacion" name="mensajeDonacion"><br>
                            <input type="submit" id="enviarDonacion" value="Donar">
                        </form>
                        </div>
                    ';
            } else {
                echo '
                        <p><b>Por favor, si quere realizar una donacion primero ha de estar registrado y logueado</b></p>
                        <a class="elementoMenu" id="inicioSesionA" href="../public/register.php">Registrarse</a>
                        <a class="elementoMenu" id="registerA" href="../public/login.php">Login</a>
                    ';
            }
            ?>
        </div>
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