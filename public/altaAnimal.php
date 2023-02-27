<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/styles.css" />
  <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
  <title>Formulario de Animales</title>
</head>

<body>
  <div class="formFlexAltaAnimales">
    <h1 id="h1AltaAnimal">Formulario de Animales</h1>
    <div id="containerFormAltaAnimal">
      <a class="backToIndex" href="../index.php">
        <h3 class="h3Login">Protectora</h3>
        <img id="logoHeader" src="../media/logos/logo.png" />
      </a>
      <form action="../modules/insertAnimal.php" method="post" enctype="multipart/form-data">
        <input type="text" name="altaAnimalNombre" id="altaAnimalNombre" class="elementoForm"
          placeholder="Nombre animal" maxlength="20" required />
        <select name="altaAnimalGenero" id="altaAnimalGenero" class="elementoForm" required>
          <option class="registerPermisos" value="macho">Macho</option>
          <option class="registerPermisos" value="hembra">Hembra</option>
        </select>
        <select name="altaAnimalEspecie" id="altaAnimalEspecie" class="elementoForm" required>
          <option class="registerPermisos" value="perro">Perro</option>
          <option class="registerPermisos" value="gato">Gato</option>
        </select>
        <input type="text" name="altaAnimalRaza" id="altaAnimalRaza" class="elementoForm" placeholder="Raza"
          maxlength="28" required />
        <input type="date" name="altaAnimalFecha" id="altaAnimalFecha" class="elementoForm" required />
        <label id="subirFoto" for="foto">Seleccionar archivo</label>
        <input type="file" id="foto" name="foto" accept="image/jpeg" required onchange="cambiarEstiloArchivo()" />
        <?php
        session_start();
        if (isset($_SESSION["alta_animal_exitosa"])) {
          echo "<p id='infoLoginYRegister'>" . $_SESSION["alta_animal_exitosa"] . "</p>";
          unset($_SESSION["alta_animal_exitosa"]);
        }
        if (isset($_SESSION['error_alta_animal'])) {
          echo "<p id='infoLoginYRegister'>" . $_SESSION['error_alta_animal'] . "</p>";
          unset($_SESSION['error_alta_animal']);
        }
        session_destroy();
        ?>
        <button class="btnForm" type="submit">Enviar</button>
      </form>
    </div>
  </div>

  <script src="../js/cambiarEstiloSubirArchivo.js"></script>
</body>

</html>