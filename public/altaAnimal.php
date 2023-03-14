<!DOCTYPE html>
<html lang='es'>

<head>
  <meta charset='UTF-8' />
  <meta http-equiv='X-UA-Compatible' content='IE=edge' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <link rel='stylesheet' href='../libraries/hamburguers/hamburguers.css'>
  <link rel='stylesheet' href='../styles/styles.css' />
  <link rel='icon' type='image/png' href='../media/logos/logoWhite.png' />
  <title>Formulario de Animales</title>
</head>

<body>

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

  <?php
  session_start();
  include("../modules/comprobarNivelAcceso.php");
  // Si el usuario es admin o veterinario, se muestra el formulario de registro de animales, si no, se muestra un mensaje de que no tiene permisos para acceder a esta pagina
  if (comprobarNivelAcceso() == "admin" || comprobarNivelAcceso() == "veterinario") {
    echo "<div class='formFlexAltaAnimales'>
    <h1 id='h1AltaAnimal'>Formulario de Animales</h1>
    <div id='containerFormAltaAnimal'>
      <a class='backToIndex' href='../index.php'>
        <h3 class='h3Login'>Protectora</h3>
        <img id='logoHeader' src='../media/logos/logo.png' />
        <div class='aFormAdministracion'>
          <a id='aAzul' href='../index.php'>Index</a>
          <a id='aAzul' href='./veterinarioPanel.php'>Panel veterinario</a>
        </div>
      </a>
      <form action='../modules/insertAnimal.php' method='post' enctype='multipart/form-data'>
        <input type='text' name='altaAnimalNombre' id='altaAnimalNombre' class='elementoForm'
          placeholder='Nombre animal' maxlength='20' required />
        <select name='altaAnimalGenero' id='altaAnimalGenero' class='elementoForm' required>
          <option class='registerPermisos' value='macho'>Macho</option>
          <option class='registerPermisos' value='hembra'>Hembra</option>
        </select>
        <select name='altaAnimalEspecie' id='altaAnimalEspecie' class='elementoForm' required>
          <option class='registerPermisos' value='perro'>Perro</option>
          <option class='registerPermisos' value='gato'>Gato</option>
        </select>
        <input type='text' name='altaAnimalRaza' id='altaAnimalRaza' class='elementoForm' placeholder='Raza'
          maxlength='28' required />
        <input type='date' name='altaAnimalFecha' id='altaAnimalFecha' class='elementoForm' required />
        <label id='subirFoto' for='foto'>Seleccionar archivo</label>
        <input type='file' id='foto' name='foto' accept='image/jpeg' required onchange='cambiarEstiloArchivo()' />";

    if (isset($_SESSION['alta_animal_exitosa'])) {
      echo '<p id="infoLoginYRegister">' . $_SESSION['alta_animal_exitosa'] . '</p>';
      unset($_SESSION['alta_animal_exitosa']);
    }
    if (isset($_SESSION['error_alta_animal'])) {
      echo '<p id="infoLoginYRegister">' . $_SESSION['error_alta_animal'] . '</p>';
      unset($_SESSION['error_alta_animal']);
    }
    echo "<button class='btnForm' type='submit'>Enviar</button>
      </form>
    </div>
  </div>
  <script src='../js/cambiarEstiloSubirArchivo.js'></script>";
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