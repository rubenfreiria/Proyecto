<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Adopciones</title>
</head>

<body id="bodyAdopciones">
    <h1>Adopciones</h1>

    <main id="mainAdopciones">
        <?php
        include('../modules/PDO.php');
        $pdo = conectarBD("otro");
        $consulta = "SELECT nombre, genero, raza, fecha_nacimiento, foto FROM animales;";
        $resultado = $pdo->query($consulta);
        $datosAnimal = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($datosAnimal as $animal) {
            echo "<div class='animal'>";
            echo "<div class='animalImagen'>";
            echo "<img src=" . $animal['foto'] . " alt='foto_animal' />";
            echo "</div>";
            echo "<div class='animalInfo'>";
            echo "<p id='animalNombre'>Nombre: " . $animal['nombre'] . "</p>";
            echo "<p>Raza: " . $animal['raza'] . "</p>";
            echo "<p>Sexo: " . $animal['genero'] . "</p>";
            echo "<p>Fecha de nacimiento: " . $animal['fecha_nacimiento'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </main>
</body>

</html>