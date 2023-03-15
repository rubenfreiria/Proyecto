<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
  <link rel="stylesheet" href="../libraries/hamburguers/hamburguers.css">
  <link rel="stylesheet" href="../styles/styles.css" />
  <title>Alta usuarios</title>
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
      <a href="./donaciones.php">Donaciones</a>
      <a href="./noticias.php">Noticias</a>
      <a href="./contacto.php">Contacto</a>
    </nav>
  </aside>
  <?php
  include("../modules/comprobarNivelAcceso.php");
  session_start();
  // Si el usuario es admin, se muestra el formulario de registro de usuarios, si no, se muestra un mensaje de que no tiene permisos para acceder a esta pagina
  if (comprobarNivelAcceso() == "admin") {
    echo "<div class='formFlex'>
        <div id='containerFormAdmin'>
          <div class='containerH1yLogo'>
            <h3 class='h3Login'>Protectora</h3>
            <img id='logoHeader' src='../media/logos/logo.png' />
            <div class='aFormAdministracion'>
              <a id='aAzul' href='../index.php'>Index</a>
              <a id='aAzul' href='./administracionPanel.php'>Administracion</a>
            </div>
          </div>
          <form action='../modules/insertUserAdminEnBD.php' method='post'>
            <input
              type='email'
              name='registerEmail'
              id='registerAdminEmail'
              class='elementoForm'
              placeholder='Correo electronico'
              required
            />
            <input
              type='text'
              name='registerName'
              id='registerAdminName'
              class='elementoForm'
              placeholder='Nombre'
              required
            />
            <input
              type='text'
              name='registerApellidos'
              id='registerAdminApellidos'
              class='elementoForm'
              placeholder='Apellidos'
              required
            />
            <select
              name='registerPermisos'
              id='registerAdminPermisos'
              class='elementoForm'
              required
            >
              <option class='registerPermisos' value='admin'>Admin</option>
              <option class='registerPermisos' value='veterinario'>Veterinario</option>
              <option class='registerPermisos' value='otro'>Otro</option>
            </select>
            <input
              type='tel'
              name='registerPhone'
              id='registerAdminPhone'
              class='elementoForm'
              placeholder='Teléfono'
              maxlength='9'
              required
            />
            <input
              type='password'
              name='registerPassword'
              id='registerAdminPassword'
              class='elementoForm'
              placeholder='Contaseña'
              required
            />";

    if (isset($_SESSION["error_register"])) {
      echo "<p id='infoLoginYRegister'>" . $_SESSION["error_register"] . "</p>";
      unset($_SESSION["error_register"]);
    }
    if (isset($_SESSION['registro_exitoso'])) {
      echo "<p id='infoLoginYRegister'>" . $_SESSION['registro_exitoso'] . "</p>";
      unset($_SESSION['registro_exitoso']);
    }
    echo "<button class='btnForm' type='submit'>Enviar</button>
          </form>
        </div>
      </div>";
  } else {
    echo "  <div id='containerFaltanPermisos'>
                    <div id='faltanPermisos'>
                        <h2 id='h2FaltanPermisos'>No tienes permisos para acceder a esta pagina</h2>
                        <a id='aAzul' href='../index.php'>Volver a la pagina principal</a>
                    </div>
                </div>";
  }
  ?>
  <script src="../js/menuResponsive.js" type="module"></script>
</body>

</html>