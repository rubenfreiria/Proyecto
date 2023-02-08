<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Login</title>
  </head>
  <body class="formFlex">
    <div id="containerFormRegister">
      <a class="backToIndex" href="../index.php"
        ><h3 class="h3Login">Protectora</h3>
        <img id="logoHeader" src="../media/logos/logo.png"
      /></a>
      <form action="">
        <input
          type="email"
          name="registerEmail"
          id="registerEmail"
          class="elementoForm"
          placeholder="Correo electronico"
          required
        />
        <input
          type="text"
          name="registerName"
          id="registerName"
          class="elementoForm"
          placeholder="Nombre"
          required
        />
        <input
          type="text"
          name="registerApellidos"
          id="registerApellidos"
          class="elementoForm"
          placeholder="Apellidos"
          required
        />
        <input
          type="tel"
          name="registerPhone"
          id="registerPhone"
          class="elementoForm"
          placeholder="Teléfono"
          required
        />
        <input
          type="password"
          name="registerPassword"
          id="registerPassword"
          class="elementoForm"
          placeholder="Contaseña"
          required
        />
        <button class="btnForm" type="submit">Enviar</button>
      </form>
      <p class="cambioForm">
        Ya tienes cuenta?<a href="./login.php"> Iniciar sesión</a>
      </p>
    </div>
  </body>
</html>
