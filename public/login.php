<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
  <link rel="stylesheet" href="../libraries/hamburguers/hamburguers.css">
  <link rel="stylesheet" href="../styles/styles.css" />
  <title>Login</title>
</head>

<body>
  <button class="panelr-btn hamburger--spring" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>
  <aside class="panelr is-active">
    <nav class="menuReducido">
      <a href="../index.php">Inicio</a>
      <a href="./adopciones.php">Adopciones</a>
      <a href="./noticias.php">Noticias</a>
      <a href="./contacto.php">Contacto</a>
    </nav>
  </aside>
  <div class="formFlex">
    <div id="containerFormLogin">
      <a class="backToIndex" href="../index.php">
        <h3 class="h3Login">Protectora</h3>
        <img id="logoHeader" src="../media/logos/logo.png" />
      </a>
      <form action="../modules/iniciaSesion.php" method="post">
        <input type="email" name="loginEmail" id="loginEmail" class="elementoForm" placeholder="Correo electronico"
          required />
        <input type="password" name="loginPassword" id="loginPassword" class="elementoForm" placeholder="Contaseña"
          required />
        <?php
        session_start();
        // Si ha habido un error en el login lo mostramos
        if (isset($_SESSION["error_login"])) {
          echo "<p id='infoLoginYRegister'>" . $_SESSION["error_login"] . "</p>";
          unset($_SESSION["error_login"]);
        }
        session_destroy();
        ?>
        <button class="btnForm" type="submit">Enviar</button>
      </form>
      <p class="cambioForm">
        No tienes cuenta?<a href="register.php"> Regístrate</a>
      </p>
    </div>
  </div>
  <script src="../js/menuResponsive.js" type="module"></script>
</body>

</html>