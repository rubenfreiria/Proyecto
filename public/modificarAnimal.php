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
    <div id="centrarContainer">
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
echo "<div id='containerModificarAnimal'>
        <form action='../modules/guardarModificacion.php' method='post'>
            <input type='hidden' name='id' value='" . $fila['id'] . "'>
            <label for='nombre'>Nombre:</label>
            <input type='text' name='nombre' id='inputModificacionAnimal' value='" . $fila['nombre'] . "'><br>
            <label for='genero'>Género:</label>
            <select name='genero' id='inputModificacionAnimal'>
                <option value='macho' " . ($fila['genero'] == 'macho' ? 'selected' : '') . ">Macho</option>
                <option value='hembra' " . ($fila['genero'] == 'hembra' ? 'selected' : '') . ">Hembra</option>
            </select><br>
            <label for='especie'>Especie:</label>
            <select name='especie' id='inputModificacionAnimal'>
                <option value='perro' " . ($fila['especie'] == 'perro' ? 'selected' : '') . ">Perro</option>
                <option value='gato' " . ($fila['especie'] == 'gato' ? 'selected' : '') . ">Gato</option>
            </select><br>
            <label for='raza'>Raza:</label>
            <input type='text' name='raza' id='inputModificacionAnimal' value='" . $fila['raza'] . "'><br>
            <label for='fecha_nacimiento'>Fecha de nacimiento:</label>
            <input type='date' name='fecha_nacimiento' id='inputModificacionAnimal' value='" . $fila['fecha_nacimiento'] . "'><br>
            <label for='estado'>Estado:</label>
            <select name='estado' id='inputModificacionAnimal'>
                <option value='adoptado' " . ($fila['estado'] == 'adoptado' ? 'selected' : '') . ">Adoptado</option>
                <option value='disponible' " . ($fila['estado'] == 'disponible' ? 'selected' : '') . ">Disponible</option>
                <option value='baja' " . ($fila['estado'] == 'baja' ? 'selected' : '') . ">Baja</option>
            </select><br>
            <input type='submit' id='inputEnviarModificacionAnimal' value='Guardar cambios'>
        </form>
    </div>";

        ?>
    </div>
</body>

</html>