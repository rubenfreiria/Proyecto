<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Adopciones</title>
</head>

<body>
    <header>
        <nav id="menu">
            <div id="menuIzquierda">
                <img class="elementoMenu" id="logoHeader" src="../media/logos/logoWhite.png" />
                <h3>
                    <a class="elementoMenu" id="h3Menu" href="index.php">Protectora</a>
                </h3>
            </div>
            <div id="menuDerecha">
                <a class="elementoMenu" href="public/register.php">Registrarse</a>
                <a class="elementoMenu" href="public/login.php">Login</a>
            </div>
        </nav>
    </header>
    <section>
        <div id="menuContainer">
            <a class="menuLink" href="">Adopciones</a>
            <a class="menuLink" href="">Donaciones</a>
            <a class="menuLink" href="">Noticias</a>
            <a class="menuLink" href="">Calendario</a>
            <a class="menuLink" href="">Contacto</a>
        </div>
    </section>
    <div id="bodyAdopciones">
    <h1>Adopciones</h1>
    <main id="mainAdopciones">
        <?php
        include('../modules/PDO.php');
        $pdo = conectarBD("otro");
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
            echo "<p>Fecha nacimiento: <b>" . $animal['fecha_nacimiento'] . "</b></p>";
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
</body>

</html>