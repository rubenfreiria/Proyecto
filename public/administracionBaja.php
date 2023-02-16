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

    <form action="">
      <TABLE>
        <tr id="trRed">
          <TD>id</TD>
          <td>Nivel de acceso</td>
          <TD>nombre</TD>
          <TD>apellidos</TD>
          <TD>telefono</TD>
          <TD>email</TD>
          <td>Borrar</td>
        </tr>
        <TR>
          <TD>1</TD>
          <TD>admin</TD>
          <TD>Pepe</TD>
          <TD>Perez</TD>
          <TD>665050670</TD>
          <TD>pepe@pepe.com</TD>
          <TD><input type="checkbox"></TD>
        </TR>
        <TR>
          <TD>2</TD>
          <TD>admin2</TD>
          <TD>Pepe2</TD>
          <TD>Perez2</TD>
          <TD>6650502670</TD>
          <TD>pepe@pe2pe.com</TD>
          <TD><input type="checkbox"></TD>
        </TR>
        <TR>
          <TD>2</TD>
          <TD>admin2</TD>
          <TD>Pepe2</TD>
          <TD>Perez2</TD>
          <TD>6650502670</TD>
          <TD>pepe@pe2pe.com</TD>
          <TD><input type="checkbox"></TD>
        </TR>
        <TR>
          <TD>2</TD>
          <TD>admin2</TD>
          <TD>Pepe2</TD>
          <TD>Perez2</TD>
          <TD>6650502670</TD>
          <TD>pepe@pe2pe.com</TD>
          <TD><input type="checkbox"></TD>
        </TR>
        <TR>
          <TD>2</TD>
          <TD>admin2</TD>
          <TD>Pepe2</TD>
          <TD>Perez2</TD>
          <TD>6650502670</TD>
          <TD>pepe@pe2pe.com</TD>
          <TD><input type="checkbox"></TD>
        </TR>
        <TR>
          <TD>2</TD>
          <TD>admin2</TD>
          <TD>Pepe2</TD>
          <TD>Perez2</TD>
          <TD>6650502670</TD>
          <TD>pepe@pe2pe.com</TD>
          <TD><input type="checkbox"></TD>
        </TR>
        <TR>
          <TD>2</TD>
          <TD>admin2</TD>
          <TD>Pepe2</TD>
          <TD>Perez2</TD>
          <TD>6650502670</TD>
          <TD>pepe@pe2pe.com</TD>
          <TD><input type="checkbox"></TD>
        </TR>
      </TABLE>

      <!-- Php -->
      <?php
      include('../modules/PDO.php');
      $pdo = conectarBD("admin");
      $consulta = "SELECT id, nivel_acceso, nombre, apellidos, telefono, email FROM usuarios;";
      $resultado = $pdo->query($consulta);
      $datosUsuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
      foreach ($datosUsuarios as $usuario) {
        echo "<tr>";
        echo "<td>" . $usuario["id"] . "</td><br>";
        echo "</tr>";
      }
      ?>
      <button type="submit">Enviar</button>
    </form>
  </div>
</body>

</html>