<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
  <link rel="stylesheet" href="../styles/styles.css" />
  <title>Login</title>
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
        <a class="elementoMenu" href="../public/register.php">Registrarse</a>
        <a class="elementoMenu" href="../public/login.php">Login</a>
      </div>
    </nav>
  </header>
  <section>
    <div id="menuContainer">
      <a class="menuLink" href="./adopciones.php">Adopciones</a>
      <a class="menuLink" href="">Donaciones</a>
      <a class="menuLink" href="">Noticias</a>
      <a class="menuLink" href="">Calendario</a>
      <a class="menuLink" href="">Contacto</a>
    </div>
  </section>
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

</body>

</html>