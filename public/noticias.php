<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
    <link rel="stylesheet" href="../libraries/hamburguers/hamburguers.css">
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Noticias</title>
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
                // Si hay una sesion iniciada mostramos el nombre del usuario y el boton de cerrar sesion, si no mostramos el boton de login y el de registrarse
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
        <h1>Noticias</h1>
        <main id="mainAdopciones">

            <?php
            //Se cargan las noticias de la base de datos
            $pdo = conectarBD("otro");
            $orden = "DESC";
            if (isset($_GET['orden']) && ($_GET['orden'] == "asc" || $_GET['orden'] == "desc")) {
                $orden = $_GET['orden'];
            }
            $consulta = "SELECT titulo, fecha, cuerpo, foto FROM noticias ORDER BY fecha $orden;";
            $resultado = $pdo->query($consulta);
            $datosNoticia = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datosNoticia as $noticia) {
                echo "<div class='noticia'>";
                echo "<div class='noticiaImagen'>";
                echo "<img src=" . $noticia['foto'] . " alt='foto_noticia' />";
                echo "</div>";
                echo "<div class='noticiaInfo'>";
                echo "<p id='noticiaTitulo'>" . $noticia['titulo'] . "</p>";
                echo "<p id='noticiaFecha'>Fecha: " . date('d - m - y', strtotime($noticia['fecha'])) . "</p>";
                echo "<p>" . $noticia['cuerpo'] . "</p>";
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