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

    <form action="../modules/procesarBaja.php" method="post">
      <table>
        <tr id="trRed">
          <td>id</td>
          <td>Nivel de acceso</td>
          <td>nombre</td>
          <td>apellidos</td>
          <td>telefono</td>
          <Td>email</td>
          <td>Borrar</td>
        </tr>
        <?php
        include('../modules/PDO.php');
        $pdo = conectarBD("admin");
        $consulta = "SELECT id, nivel_acceso, nombre, apellidos, telefono, email FROM usuarios;";
        $resultado = $pdo->query($consulta);
        $datosUsuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($datosUsuarios as $usuario) {
          if($usuario["id"]>3){
            echo "<tr>";
            echo "<td>" . $usuario["id"] . "</td>";
            echo "<td>" . $usuario["nivel_acceso"] . "</td>";
            echo "<td>" . $usuario["nombre"] . "</td>";
            echo "<td>" . $usuario["apellidos"] . "</td>";
            echo "<td>" . $usuario["telefono"] . "</td>";
            echo "<td>" . $usuario["email"] . "</td>";
            echo "<td><input type='checkbox' name='borrar[]' value='" . $usuario["id"] . "'></td>";
            echo "</tr>";
          }
        }
        ?>
      </table>
      <button type="submit">Enviar</button>
    </form>
  </div>
</body>

</html>