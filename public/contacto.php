<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
    <link rel="stylesheet" href="../libraries/hamburguers/hamburguers.css">
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
                include("../modules/comprobarNivelAcceso.php");
                // Comprobamos si el usuario esta logeado, si es asi mostramos su nombre y un boton para cerrar sesion, si no, mostramos un boton para iniciar sesion y otro para registrarse
                if (isset($_SESSION["userID"])) {
                    if (comprobarNivelAcceso() == "admin") {
                        echo "<p id='nombreUserArriba'><img id='imgUserArriba' src='../media/logos/userAdmin.png' alt='Icono usuario'>" . $_SESSION['userNombre'] . "</p>";
                        echo "<button id='btnPanelAdministracion' value='btnPanelAdministracion' class='elementoMenu'><a href='./administracionPanel.php'>Administracion</a></button>";
                    } elseif (comprobarNivelAcceso() == "veterinario") {
                        echo "<p id='nombreUserArriba'><img id='imgUserArriba' src='../media/logos/userVeterinario.png' alt='Icono usuario'>" . $_SESSION['userNombre'] . "</p>";
                        echo "<button id='btnPanelAdministracion' value='btnPanelAdministracion' class='elementoMenu'><a href='./veterinarioPanel.php'>Administracion</a></button>";
                    } else {
                        echo "<p id='nombreUserArriba'><img id='imgUserArriba' src='../media/logos/user.png' alt='Icono usuario'>" . $_SESSION['userNombre'] . "</p>";
                    }
                    echo "<form id='formCerrarSesion' action='../modules/cerrarSesion.php' method='post'>
                    <button type='submit' id='btnCerrarSesion' value='btnCerrarSesion' class='elementoMenu'>Cerrar sesión</button>
                    </form>";

                } else {
                    echo '<a class="elementoMenu" id="inicioSesionA" href="./register.php">Registrarse</a>
                    <a class="elementoMenu" id="registerA" href="./login.php">Login</a>';
                }
                ?>
            </div>
        </nav>
    </header>
    <section>
        <button class="panelr-btn hamburger--spring" type="button">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </button>
        <aside class="panelr is-active">
            <nav class="menuReducido">
                <a href="../index.php">Inicio</a>
                <a href="./adopciones.php">Adopciones</a>
                <a href="./donaciones.php">Donaciones</a>
                <a href="./noticias.php">Noticias</a>
                <a href="./contacto.php">Contacto</a>
            </nav>
        </aside>
        <div id="menuContainer">
            <a class="menuLink" href="./adopciones.php">Adopciones</a>
            <a class="menuLink" href="./donaciones.php">Donaciones</a>
            <a class="menuLink" href="./noticias.php">Noticias</a>
            <a class="menuLink" href="./contacto.php">Contacto</a>
        </div>
    </section>
    <div id="bodyContactos">
        <h1>Contacto</h1>
        <div id="mainContacto">
            <div id="direccion">
                <div id="contMap">
                    <div id="map"></div>
                </div>
                <div id="textMap">
                    <h2>Donde encontrarnos</h2>
                    <p><b>Número de telefono:</b> 690 420 123</p>
                    <p><b>Correo Electronico:</b> protectoraTeis@procteis.com</p>
                    <h3>Dirección:</h3>
                    <p>Angela Iglesias Rebollar 91</p>
                    <p>36216 Vigo, Pontevedra</p>
                </div>
            </div>
        </div>
        <div id="horario">
            <h1>Horario</h1>
            <p>Aceptamos recogidas en todo nuestro horario de <b>9:00 - 20:00</b></p>
            <p>Nuestro horario de visitas es el siguiente:</p>
            <table id="tablaHorario">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sábado</th>
                        <th>Domingo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>9:00 AM</td>
                        <td rowspan="4" class="celdaVisitas">VISITAS</td>
                        <td rowspan="2" class="celda"></td>
                        <td rowspan="4" class="celdaVisitas">VISITAS</td>
                        <td rowspan="2" class="celda"></td>
                        <td rowspan="4" class="celdaVisitas">VISITAS</td>
                        <td rowspan="1" class="celda"></td>
                        <td rowspan="1" class="celda"></td>
                    </tr>
                    <tr>
                        <td>10:00 AM</td>
                        <td rowspan="3" class="celdaVisitas">VISITAS</td>
                        <td rowspan="3" class="celda"></td>
                    </tr>
                    <tr>
                        <td>11:00 AM</td>
                        <td rowspan="2" class="celdaVisitas">VISITAS</td>
                        <td rowspan="2" class="celdaVisitas">VISITAS</td>
                    </tr>
                    <tr>
                        <td>12:00 PM</td>
                    </tr>
                    <tr>
                        <td>1:00 PM</td>
                        <td rowspan="3" colspan="7" class="celda"></td>
                    </tr>
                    <tr>
                        <td>2:00 PM</td>
                    </tr>
                    <tr>
                        <td>3:00 PM</td>
                    </tr>
                    <tr>
                        <td>4:00 PM</td>
                        <td rowspan="3" class="celdaVisitas">VISITAS</td>
                        <td rowspan="2" class="celdaVisitas">VISITAS</td>
                        <td rowspan="3" class="celdaVisitas">VISITAS</td>
                        <td rowspan="2" class="celdaVisitas">VISITAS</td>
                        <td rowspan="3" class="celdaVisitas">VISITAS</td>
                        <td rowspan="3" class="celda"></td>
                        <td rowspan="5" class="celda"></td>
                    </tr>
                    <tr>
                        <td>5:00 PM</td>
                    </tr>
                    <tr>
                        <td>6:00 PM</td>
                        <td rowspan="3" class="celda"></td>
                        <td rowspan="3" class="celda"></td>
                    </tr>
                    <tr>
                        <td>7:00 PM</td>
                        <td rowspan="2" class="celda"></td>
                        <td rowspan="2" class="celda"></td>
                        <td rowspan="2" class="celda"></td>
                        <td rowspan="2" class="celda"></td>
                    </tr>
                    <tr>
                        <td>8:00 PM</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <footer id="footer-index">
        <div id="social">
            <a href="https://www.instagram.com/">
                <img id="instagram" src="../media/social/instagram.svg" alt="instagram" />
            </a>
            <a href="https://www.tiktok.com/">
                <img id="tiktok" src="../media/social/tiktok.svg" alt="tiktok" />
            </a>
            <a href="https://twitter.com/">
                <img id="twitter" src="../media/social/twitter.svg" alt="twitter" />
            </a>
        </div>
    </footer>
    <button class="scroll-top-btn hidden">&#11014;</button>
    <script src="../js/scrollTopBtn.js"></script>
    <script src="../js/menuResponsive.js" type="module"></script>
</body>

</html>