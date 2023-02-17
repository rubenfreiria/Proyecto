<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../media/logos/logoWhite.png" />
  <link rel="stylesheet" href="../styles/styles.css" />
  <title>Baja Usuarios</title>
</head>

<body>
  <div id="containerDarDeBaja">
    <h1 id="h1DarDeBaja">Dar de baja</h1>
    <div class='aFormAdministracion'>
      <a id='aAzul' href='../index.php'>Index</a>
      <a id='aAzul' href='./administracionPanel.php'>Administracion</a>
    </div>

    <form action="../modules/procesarBaja.php" method="post">
      <table>
        <tr id="trRed">
          <td id='tdID'>id</td>
          <td>Nivel acceso</td>
          <td>Nombre</td>
          <td>Apellidos</td>
          <td>Teléfono</td>
          <Td>Email</td>
          <td id='tdBorrar'>Borrar</td>
        </tr>
        <?php
        include('../modules/PDO.php');
        $pdo = conectarBD("admin");
        $consulta = "SELECT id, nivel_acceso, nombre, apellidos, telefono, email FROM usuarios;";
        $resultado = $pdo->query($consulta);
        $datosUsuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($datosUsuarios as $usuario) {
          if ($usuario["id"] > 3) {
            echo "<tr>";
            echo "<td id='tdID'>" . $usuario["id"] . "</td>";
            echo "<td>" . $usuario["nivel_acceso"] . "</td>";
            echo "<td>" . $usuario["nombre"] . "</td>";
            echo "<td>" . $usuario["apellidos"] . "</td>";
            echo "<td>" . $usuario["telefono"] . "</td>";
            echo "<td>" . $usuario["email"] . "</td>";
            echo "<td id='tdBorrar'><input type='checkbox' name='borrar[]' value='" . $usuario["id"] . "'></td>";
            echo "</tr>";
          }
        }
        ?>
      </table>
      <button id="btnAdministracionBaja" type="submit">Enviar</button>
    </form>
  </div>
</body>

</html>