<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Noticias</title>
    <style>

.noticia {
  clear: both;
  padding: 20px;
  overflow: hidden;
  max-width: 1600px;
  margin: 50px;
}

@media screen and (max-width: 660px) {
    .noticia {
        margin: 12px;
    }
}

.noticiaImagen {
  width: 500px;
  height: 400px;
  margin-right: 20px;
  float: left;
}

.noticiaImagen img {
  display: block;
  max-width: 100%;
  height: auto;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.noticiaInfo {
  padding: 20px 0;
}

#noticiaTitulo {
  font-size: 30px;
  font-weight: bold;
  margin-top: 0;
}

#noticiaFecha {
    font-size: 20px;
}

.noticiaInfo p {
  margin: 0;
  margin-bottom: 10px;
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
            <a class="menuLink" href="">Donaciones</a>
            <a class="menuLink" href="">Noticias</a>
            <a class="menuLink" href="">Calendario</a>
            <a class="menuLink" href="">Contacto</a>
        </div>
    </section>
    <div id="bodyAdopciones">
        <h1>Noticias</h1>
        <main id="mainAdopciones">
            <?php
            include('../modules/PDO.php');
            $pdo = conectarBD("otro");
            $consulta = "SELECT titulo, fecha, cuerpo, foto FROM noticias;";
            $resultado = $pdo->query($consulta);
            $datosNoticia = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datosNoticia as $noticia) {
                echo "<div class='noticia'>";
                echo "<div class='noticiaImagen'>";
                echo "<img src=" . $noticia['foto'] . " alt='foto_noticia' />";
                echo "</div>";
                echo "<div class='noticiaInfo'>";
                echo "<p id='noticiaTitulo'>" . $noticia['titulo'] . "</p>";
                echo "<p id='noticiaFecha'>Fecha: " . $noticia['fecha'] . "</p>";
                echo "<p>" . $noticia['cuerpo'] . "</p>";
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