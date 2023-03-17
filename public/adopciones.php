<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
    <link rel="stylesheet" href="../libraries/hamburguers/hamburguers.css">
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Adopciones</title>
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
                // Si el usuario esta logueado, se muestra su nombre y un boton para cerrar sesion, si no, se muestran los botones de login y registro
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
    <div id="bodyAdopciones">
        <h1>Adopciones</h1>
        <div>
            <?php
            // Si el usuario no esta logueado, se muestra un mensaje de error
            // Si se realiza una adopcion, se muestra un mensaje de confirmacion
            if (isset($_SESSION["adopciones_nologed"])) {
                echo "<h3 id='mensajeAdopciones'>" . $_SESSION["adopciones_nologed"] . "</h3>";
                unset($_SESSION["adopciones_nologed"]);
            } else if (isset($_SESSION["adopciones_enviado"])) {
                echo "<h3 id='mensajeAdopciones'>" . $_SESSION["adopciones_enviado"] . "</h3>";
                unset($_SESSION["adopciones_enviado"]);
            }
            ?>
        </div>
        <main id="mainAdopciones">
            <?php
            $pdo = conectarBD("otro");
            // Se cargan los animales de la base de datos y se muestran en la pagina
            $consulta = "SELECT nombre, genero, raza, fecha_nacimiento, foto FROM animales;";
            $resultado = $pdo->query($consulta);
            $datosAnimal = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datosAnimal as $animal) {
                echo "<div class='animal'>";
                echo "<div class='animalImagen'>";
                echo "<img src=" . $animal['foto'] . " alt='foto_animal' />";
                echo "</div>";
                echo "<div class='animalInfo'>";
                echo "<p id='animalNombre'><b>" . $animal['nombre'] . "</b></p>";
                echo "<p>Raza: <b>" . $animal['raza'] . "</b></p>";
                echo "<p>Sexo: <b>" . $animal['genero'] . "</b></p>";
                echo "<p>Fecha nacimiento: <b>" . date('d - m - y', strtotime($animal['fecha_nacimiento'])) . "</b></p>";
                echo "<form method='POST' action='../modules/mailAdopciones.php'>";
                echo "<div id='divBtnAdoptar'>";
                echo "<input id='btnFormAdopciones' type='submit' name='btnAdoptar' value='Adoptar'>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }

            ?>
        </main>
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