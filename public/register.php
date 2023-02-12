<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/styles.css" />
  <title>Register</title>
</head>

<body class="formFlex">
  <div id="containerFormRegister">
    <a class="backToIndex" href="../index.php">
      <h3 class="h3Login">Protectora</h3>
      <img id="logoHeader" src="../media/logos/logo.png" />
    </a>
    <form action="../modules/insertRegisterUser.php" method="post">
      <input type="email" name="registerEmail" id="registerEmail" class="elementoForm" placeholder="Correo electronico"
        required />
      <input type="text" name="registerName" id="registerName" class="elementoForm" placeholder="Nombre" required />
      <input type="text" name="registerApellidos" id="registerApellidos" class="elementoForm" placeholder="Apellidos"
        required />
      <input type="tel" name="registerPhone" id="registerPhone" class="elementoForm" placeholder="Teléfono" required/>
      <input type="password" name="registerPassword" id="registerPassword" class="elementoForm" placeholder="Contaseña"
        required />
      <?php
      session_start();
      if (isset($_SESSION["error_register"])) {
        echo "<p id='infoLoginYRegister'>" . $_SESSION["error_register"] . "</p>";
        unset($_SESSION["error_register"]);
      }
      if (isset($_SESSION['registro_exitoso'])) {
        echo "<p id='infoLoginYRegister'>" . $_SESSION['registro_exitoso'] . "</p>";
        unset($_SESSION['registro_exitoso']);
      }
      session_destroy();
      ?>
      <button class="btnForm" type="submit">Enviar</button>
    </form>
    <p class="cambioForm">
      Ya tienes cuenta?<a href="./login.php"> Iniciar sesión</a>
    </p>
  </div>
</body>

</html>