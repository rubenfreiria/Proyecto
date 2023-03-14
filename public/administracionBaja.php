<!DOCTYPE html>
<html lang='es'>

<head>
  <meta charset='UTF-8' />
  <meta http-equiv='X-UA-Compatible' content='IE=edge' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <link rel='icon' type='image/png' href='../media/logos/logoWhite.png' />
  <link rel='stylesheet' href='../libraries/hamburguers/hamburguers.css'>
  <link rel='stylesheet' href='../styles/styles.css' />
  <title>Baja Usuarios</title>
</head>

<body>
  <header>
    <nav id='menu'>
      <div id='menuIzquierda'>
        <img class='elementoMenu' id='logoHeader' src='../media/logos/logoWhite.png' />
        <h3>
          <a class='elementoMenu' id='h3Menu' href='../index.php'>Protectora</a>
        </h3>
      </div>
      <div id='menuDerecha'>
        <?php
        // Se comprueba si el usuario esta logueado, si lo esta, se muestra su nombre y un boton para cerrar sesion, si no, se muestran los botones de login y registro
        session_start();
        include('../modules/comprobarNivelAcceso.php');
        if (isset($_SESSION['userID'])) {
          if (comprobarNivelAcceso() == 'admin') {
            echo "<p id='nombreUserArriba'><img id='imgUserArriba' src='../media/logos/userAdmin.png' alt='Icono usuario'>" . $_SESSION['userNombre'] . "</p>";
            echo "<button id='btnPanelAdministracion' value='btnPanelAdministracion' class='elementoMenu'><a href='./administracionPanel.php'>Administracion</a></button>";
          } elseif (comprobarNivelAcceso() == 'veterinario') {
            echo "<p id='nombreUserArriba'><img id='imgUserArriba' src='../media/logos/userVeterinario.png' alt='Icono usuario'>" . $_SESSION['userNombre'] . "</p>";
            echo "<button id='btnPanelAdministracion' value='btnPanelAdministracion' class='elementoMenu'><a href='./veterinarioPanel.php'>Administracion</a></button>";
          } else {
            echo "<p id='nombreUserArriba'><img id='imgUserArriba' src='../media/logos/user.png' alt='Icono usuario'>" . $_SESSION['userNombre'] . "</p>";
          }
          echo "<form id='formCerrarSesion' action='../modules/cerrarSesion.php' method='post'>
                    <button type='submit' id='btnCerrarSesion' value='btnCerrarSesion' class='elementoMenu'>Cerrar sesión</button>
                    </form>";

        } else {
          echo "<a class='elementoMenu' id='inicioSesionA' href='./register.php'>Registrarse</a>
                    <a class='elementoMenu' id='registerA' href='./login.php'>Login</a>";
        }
        ?>
      </div>
    </nav>
  </header>
  <section>
    <button class='panelr-btn hamburger--spring' type='button'>
      <span class='hamburger-box'>
        <span class='hamburger-inner'></span>
      </span>
    </button>
    <aside class='panelr is-active'>
      <nav class='menuReducido'>
        <a href='../index.php'>Inicio</a>
        <a href='./adopciones.php'>Adopciones</a>
        <a href='./noticias.php'>Noticias</a>
        <a href='./contacto.php'>Contacto</a>
      </nav>
    </aside>
    <div id='menuContainer'>
      <a class='menuLink' href='./adopciones.php'>Adopciones</a>
      <a class='menuLink' href='./donaciones.php'>Donaciones</a>
      <a class='menuLink' href='./noticias.php'>Noticias</a>
      <a class='menuLink' href='./contacto.php'>Contacto</a>
    </div>
  </section>


  <?php
  //Se comprueba si el usuario esta logueado y si es admin, si lo esta se le muestra la tabla con los usuarios registrados. 
  //Si no, se le muestra un mensaje de que no tiene permisos para acceder a esta pagina.
  if (comprobarNivelAcceso() == "admin") {

    echo "<div id='containerDarDeBaja'>
    <h1 id='h1DarDeBaja'>Dar de baja</h1>
    <div class='aFormAdministracion'>
      <a id='aAzul' href='../index.php'>Index</a>
      <a id='aAzul' href='./administracionPanel.php'>Administracion</a>
    </div>

    <form action='../modules/procesarBaja.php' method='post'>
      <table>
        <tr id='trRed'>
          <td id='tdID'>id</td>
          <td>Nivel acceso</td>
          <td>Nombre</td>
          <td>Apellidos</td>
          <td>Teléfono</td>
          <Td>Email</td>
          <td id='tdBorrar'>Borrar</td>
        </tr>";

    $pdo = conectarBD('otro');
    $consulta = 'SELECT id, nivel_acceso, nombre, apellidos, telefono, email FROM usuarios;';
    $resultado = $pdo->query($consulta);
    $datosUsuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($datosUsuarios as $usuario) {
      if ($usuario['id'] > 3) {
        echo '<tr>';
        echo '<td id="tdID">' . $usuario['id'] . '</td>';
        echo '<td>' . $usuario['nivel_acceso'] . '</td>';
        echo '<td>' . $usuario['nombre'] . '</td>';
        echo '<td>' . $usuario['apellidos'] . '</td>';
        echo '<td>' . $usuario['telefono'] . '</td>';
        echo '<td>' . $usuario['email'] . '</td>';
        echo "<td id='tdBorrar'><input type='checkbox' name='borrar[]' value='" . $usuario['id'] . "'></td>";

        echo '</tr>';
      }
    }

    echo "
      </table>
      <button id='btnAdministracionBaja' type='submit'>Enviar</button>
    </form>
  </div>
  <script src='../js/scrollTopBtn.js'></script>";
  } else {
    echo "  <div id='containerFaltanPermisos'>
                  <div id='faltanPermisos'>
                      <h2 id='h2FaltanPermisos'>No tienes permisos para acceder a esta pagina</h2>
                      <a id='aAzul' href='../index.php'>Volver a la pagina principal</a>
                  </div>
              </div>";
  }
  ?>
  <script src='../js/menuResponsive.js' type='module'></script>
</body>

</html>