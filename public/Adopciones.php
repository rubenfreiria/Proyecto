<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
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
    <div id="bodyAdopciones">
        <h1>Adopciones</h1>
        <main id="mainAdopciones">
            <?php
            include('../modules/PDO.php');
            $pdo = conectarBD("admin");
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
                echo "<div id='divBtnAdoptar'><button><b>Adoptar</b></button></div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </main>
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