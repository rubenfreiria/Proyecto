<!DOCTYPE html>
<html lang="es">


<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="./media/logos/logoWhite.png" />
  <link rel="stylesheet" href=".\styles\styles.css" />
  <title>Protectora</title>
</head>

<body id="index-body">
  <header>
    <nav id="menu">
      <div id="menuIzquierda">
        <img class="elementoMenu" id="logoHeader" src="./media/logos/logoWhite.png" />
        <h3>
          <a class="elementoMenu" id="h3Menu" href="index.php">Protectora</a>
        </h3>
      </div>
      <div id="menuDerecha">
        <a class="elementoMenu" id="inicioSesionA" href="public/register.php">Registrarse</a>
        <a class="elementoMenu" id="registerA" href="public/login.php">Login</a>
        <?php
        session_start();
        if (isset($_SESSION["userID"])) {
          echo "<script src='js/removeInicioSesion.js'></script>";
          echo "<form id='formCerrarSesion' action='./modules/cerrarSesion.php' method='post'>
                  <button type='submit' id='btnCerrarSesion' value='btnCerrarSesion' class='elementoMenu'>Cerrar sesión</button>
                </form>";
        }
        ?>
      </div>
    </nav>
  </header>
  <section>
    <div id="menuContainer">
      <a class="menuLink" href="public/adopciones.php">Adopciones</a>
      <a class="menuLink" href="">Donaciones</a>
      <a class="menuLink" href="">Noticias</a>
      <a class="menuLink" href="">Calendario</a>
      <a class="menuLink" href="">Contacto</a>
    </div>
  </section>
  <main id="index-main">
    <h1 class="slide-bottom">Texto</h1>
    <h1 class="slide-bottom">De</h1>
    <h1 class="slide-bottom">Ejemplo</h1>
    <video src=".\media\video\vd01.mp4" autoplay="true" muted="true" loop="true"></video>
  </main>
  <section id="quienesSomos">
    <div id="containerQuienesSomos">
      <h2>Quienes somos?</h2>
      <p>Somos una asoción protectora de animales que está ubicada en Teis</p>
    </div>
    <div id="containerImgPerroEncerrado">
      <img src="./media/perroJaula.jpg" alt="perroEncerrado" />
    </div>
  </section>
  <section id="quePuedoHacer">
    <h1>Qué puedo hacer?</h1>
    <div id="cardsContainer">
      <div class="cardQuePuedohacer" id="cardAdopta">
        <h3>Adopta</h3>
        <p>Una oportunidad de mejorar la vida de un animal</p>
        <button>Más información</button>
      </div>
      <div class="cardQuePuedohacer" id="cardApadrina">
        <h3>Apadrina</h3>
        <p>Si te gustan los animales pero no tienes el tiempo suficiente</p>
        <button>Más información</button>
      </div>
      <div class="cardQuePuedohacer" id="cardDona">
        <h3>Dona</h3>
        <p>Apoya a los animales del refugio mientras encuentran un hogar</p>
        <button>Más información</button>
      </div>
    </div>
  </section>
  <footer id="footer-index">
    <div id="social">
      <a>
        <img id="twitter" src="./media/social/instagram.svg" alt="twitter" />
      </a>
      <a>
        <img id="instagram" src="./media/social/tiktok.svg" alt="instagram" />
      </a>
      <a>
        <img id="tiktok" src="./media/social/twitter.svg" alt="tiktok" />
      </a>
    </div>
  </footer>
  <button class="scroll-top-btn hidden">&#11014;</button>
  <script src="js/scrollTopBtn.js"></script>
</body>

</html>