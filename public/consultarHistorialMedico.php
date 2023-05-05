<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../styles/styles.css' />
    <title>Consultar Historial Medico</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        echo "<p>No existe este id de animal</p>";
        exit;
    }


    /* Obtengo los datos de la tabla relacion_usuario_animal */
    include("../modules/PDO.php");
    $conexion = conectarBD("admin");
    $consulta = "SELECT * FROM relacion_usuario_animal WHERE id_animal=:id ORDER BY fecha DESC";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    /* Obtengo los datos de la tabla animal */
    $consulta = "SELECT nombre FROM animales WHERE id=:id";
    $nombreAnimal = $conexion->prepare($consulta);
    $nombreAnimal->bindParam(':id', $id, PDO::PARAM_INT);
    $nombreAnimal->execute();
    $nombreAnimal = $nombreAnimal->fetch(PDO::FETCH_ASSOC);
    echo "<div id='centrarContainer'>";
    echo "<h1>Historial médico de " . $nombreAnimal['nombre'] . "</h1>";
    ?>
    <div id='formInsertarHistorial'>
    <form action="../modules/insertarHistorialMedico.php" id="formInsertarHistorialMedico" method="POST">
        <input type="hidden" name="id_animal" value="<?php echo $_GET['id'] ?>">
        <label for="id_usuario" id="subeUsuario">Usuario</label>
        <select name="id_usuario" id="id_usuario" required>
            <?php
            $consulta = "SELECT * FROM usuarios where nivel_acceso='veterinario'";
            $resultado = $conexion->query($consulta);
            if ($resultado->rowCount() > 0) {
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
                }
            }
            ?>
        </select>
        <label for="fecha" id="bajarLabelHistorialMedico">Fecha</label>
        <input type="date" name="fecha" id="fecha" required class="inputFormHistorialMedico" value="<?php echo date('Y-m-d'); ?>">
        <label for="tratamiento" id="bajarLabelHistorialMedico">Tratamiento</label>
        <textarea type="text" name="tratamiento" id="tratamiento" required class="inputFormHistorialMedico"></textarea>
        <input type="submit" value="Añadir" id="botonInsertarHistorialMedico">
    </form>
    </div>

    <?php
    foreach ($resultados as $resultado) {
        echo "<div id='visita'>";
        $consulta_usuario = "SELECT nombre FROM usuarios WHERE id=:id_usuario";
        $stmt_usuario = $conexion->prepare($consulta_usuario);
        $stmt_usuario->bindParam(':id_usuario', $resultado['id_usuario'], PDO::PARAM_INT);
        $stmt_usuario->execute();
        $nombre_usuario = $stmt_usuario->fetch(PDO::FETCH_ASSOC);
        echo "<p>Usuario: " . $nombre_usuario['nombre'] . "</p>";
        echo "<p>Fecha visita: " . $resultado['fecha'] . "</p>";
        echo "<p>Tratamiento: " . $resultado['tratamiento'] . "</p>";
        echo "</div>";
        echo "<br>";
    }
    echo "</div>";
    // Cerrar la conexión a la base de datos
    $conexion = null;
    ?>

</body>

</html>