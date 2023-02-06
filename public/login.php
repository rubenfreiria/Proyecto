<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Login</title>
  </head>
  <body class="formFlex">
    <div id="containerFormLogin">
      <a class="backToIndex" href="../index.php"
        ><h3 class="h3Login">Protectora</h3>
        <img id="logoHeader" src="../img/logos/logo.png"
      /></a>
      <form action="procesoLogin.php" method="post">
        <input
          type="email"
          name="loginEmail"
          id="loginEmail"
          class="elementoForm"
          placeholder="Correo electronico"
          required
        />
        <input
          type="password"
          name="loginPassword"
          id="loginPassword"
          class="elementoForm"
          placeholder="Contaseña"
          required
        />
        <button class="btnForm" type="submit">Enviar</button>
      </form>
      <p class="cambioForm">
        No tienes cuenta?<a href="register.php"> Regístrate</a>
      </p>
    </div>
  </body>
</html>
