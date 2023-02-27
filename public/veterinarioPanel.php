<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
  <link rel="stylesheet" href="../styles/styles.css" />
  <title>Panel de veterinario</title>
</head>

<body>
  <?php
  include("../modules/comprobarNivelAcceso.php");
  session_start();
  if (comprobarNivelAcceso() == "admin"||comprobarNivelAcceso() == "veterinario") {
    echo "<div id='containerPanelAdministracion'>
        <h1 id='administracionH1'>Panel de veterinario</h1>
        <div class='administracionPanel'>
          <h2 id='administracionH2'>Que necesitas?</h2>
          <div class='aFormAdministracion'>
            <a id='aAzul' href='../index.php'>Volver al index</a>
          </div>
          <div class='containerBotonesFormAdministracion'>
            <a id='aPanelAdministracion' href='./altaAnimal.php'>Alta animal</a>
          </div>
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

</body>

</html>