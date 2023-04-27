<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial medico</title>
</head>

<body>
    <h1>Historial médico</h1>
    <input type="text" id="buscador" placeholder="Buscar animal por nombre">

    <?php
    // El código PHP para mostrar la tabla de animales permanece igual
    include("../modules/PDO.php");
    $conexion = conectarBD("admin");

    $consulta = "SELECT * FROM animales";
    $resultado = $conexion->query($consulta);

    if ($resultado->rowCount() > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Fecha de nacimiento</th>
                    <th>Estado</th>
                    <th>Modificar</th>
                    <th>Historial medico</th>
                </tr>";
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['genero'] . "</td>";
            echo "<td>" . $fila['especie'] . "</td>";
            echo "<td>" . $fila['raza'] . "</td>";
            echo "<td>" . $fila['fecha_nacimiento'] . "</td>";
            echo "<td>" . $fila['estado'] . "</td>";
            echo "<td><a href='../modules/modificarAnimal.php?id=" . $fila['id'] . "'>Modificar</a></td>";
            echo "<td><a href='../modules/historialMedico.php?id=" . $fila['id'] . "'>Historial medico</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay animales</p>";
    }
    ?>

    <script src="../js/buscador.js"></script>
</body>

</html>
