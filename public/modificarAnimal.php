<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../styles/styles.css' />
    <title>Modificar Animal</title>
</head>

<body>
    <div id="centrarFormulario">
        <h1>Modificar Animal</h1>
        <?php
        // Obtener el ID del animal a modificar
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            echo "<p>No se ha especificado el ID del animal a modificar.</p>";
            exit;
        }

        // Obtener los datos del animal a partir del ID
        include("../modules/PDO.php");
        $conexion = conectarBD("admin");
        $consulta = "SELECT * FROM animales WHERE id=:id";
        $resultado = $conexion->prepare($consulta);
        $resultado->bindParam(':id', $id);
        $resultado->execute();

        if ($resultado->rowCount() == 0) {
            echo "<p>No se encontró el animal con el ID especificado.</p>";
            exit;
        }

        // Mostrar el formulario de modificación con los datos del animal
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        echo "<form action='../modules/guardarModificacion.php' method='post'>
            <input type='hidden' name='id' value='" . $fila['id'] . "'>
            <label for='nombre'>Nombre:</label>
            <input type='text' name='nombre' id='nombre' value='" . $fila['nombre'] . "'><br>
            <label for='genero'>Género:</label>
            <select name='genero' id='genero'>
                <option value='Macho' " . ($fila['genero'] == 'Macho' ? 'selected' : '') . ">Macho</option>
                <option value='Hembra' " . ($fila['genero'] == 'Hembra' ? 'selected' : '') . ">Hembra</option>
            </select><br>
            <label for='especie'>Especie:</label>
            <input type='text' name='especie' id='especie' value='" . $fila['especie'] . "'><br>
            <label for='raza'>Raza:</label>
            <input type='text' name='raza' id='raza' value='" . $fila['raza'] . "'><br>
            <label for='fecha_nacimiento'>Fecha de nacimiento:</label>
            <input type='date' name='fecha_nacimiento' id='fecha_nacimiento' value='" . $fila['fecha_nacimiento'] . "'><br>
            <label for='estado'>Estado:</label>
            <input type='text' name='estado' id='estado' value='" . $fila['estado'] . "'><br>
            <input type='submit' value='Guardar cambios'>
        </form>";
        ?>
    </div>
</body>

</html>