<!DOCTYPE html>
<html lang="en">

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

    <style>
        #bodyContactos {
            margin-top: 40px;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        #mainContacto {
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items: center;
            width: 100%;
        }

        #contactoNum {
            display: flex;
            margin: 40px;
            flex-direction: column;
            text-align: center;
            align-items: center;
        }

        #contactoNum p {
            margin: 8px;
        }

        #direccion {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            width: 100%;
            background-color: var(--main-grey);
            margin-bottom: 50px;
        }

        #contMap {
            height: 500px;
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 500px;
        }

        #textMap {
            height: 400px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 500px;
        }

        #map {
            width: 100%;
            height: 100%;
            background-color: grey;
        }

        #tablaHorario {
            margin: 20px;
            border: solid 1px black;
        }

        thead {
            height: 50px;
            border: solid 1px black;
        }
    </style>
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
            <a class="menuLink" href="../public/calendario.php">Calendario</a>
            <a class="menuLink" href="../public/contacto.php">Contacto</a>
        </div>
    </section>
    <div id="bodyContactos">
        <h1>Contacto</h1>
        <div id="mainContacto">
            <div id="contactoNum">
                <h2>Donde encontrarnos</h2>
                <p><b>Número de telefono:</b> 690 420 123</p>
                <p><b>Correo Electronico:</b> protectoraTeis@procteis.com</p>
            </div>
            <div id="direccion">
                <div id="contMap">
                    <div id="map"></div>
                </div>
                <div id="textMap">
                    <h3>Dirección:</h3>
                    <p>Angela Iglesias Rebollar 91</p>
                    <p>36216 Vigo, Pontevedra</p>
                </div>
            </div>
        </div>
        <h1>Horario</h1><br>
        <div>
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
                        <td rowspan="4"></td>
                        <td rowspan="2" style="background-color: white"></td>
                        <td rowspan="4"></td>
                        <td rowspan="2" style="background-color: white"></td>
                        <td rowspan="4"></td>
                        <td rowspan="1" style="background-color: white"></td>
                        <td rowspan="1" style="background-color: white"></td>
                    </tr>
                    <tr>
                        <td>10:00 AM</td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>11:00 AM</td>
                        <td rowspan="2"></td>
                        <td rowspan="2"></td>
                    </tr>
                    <tr>
                        <td>12:00 PM</td>
                    </tr>
                    <tr>
                        <td>1:00 PM</td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                    </tr>
                    <tr>
                        <td>2:00 PM</td>
                    </tr>
                    <tr>
                        <td>3:00 PM</td>
                    </tr>
                    <tr>
                        <td>4:00 PM</td>
                        <td rowspan="3"></td>
                        <td rowspan="2"></td>
                        <td rowspan="3"></td>
                        <td rowspan="2"></td>
                        <td rowspan="3"></td>
                        <td rowspan="3"></td>
                        <td rowspan="6" style="background-color: white"></td>
                    </tr>
                    <tr>
                        <td>5:00 PM</td>
                    </tr>
                    <tr>
                        <td>6:00 PM</td>
                        <td rowspan="4" style="background-color: white"></td>
                        <td rowspan="4" style="background-color: white"></td>
                    </tr>
                    <tr>
                        <td>7:00 PM</td>
                        <td rowspan="3" style="background-color: white"></td>
                        <td rowspan="3" style="background-color: white"></td>
                        <td rowspan="3" style="background-color: white"></td>
                        <td rowspan="3" style="background-color: white"></td>
                    </tr>
                    <tr>
                        <td>8:00 PM</td>
                    </tr>
                    <tr>
                        <td>9:00 PM</td>
                    </tr>
                </tbody>
            </table>
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