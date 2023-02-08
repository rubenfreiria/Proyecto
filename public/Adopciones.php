<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/styles.css" />
    <title>Adopciones</title>
</head>

<body>
    <h1>Adopciones</h1>

    <main>
        <?php
        include('../modules/PDO.php');
        /* En produccion usar otro usuario con menos permisos que admin */
        $pdo = conectarBD("admin");
        $consulta = "SELECT nombre, genero, raza, fecha_nacimiento, foto FROM animales;";
        $resultado = $pdo->query($consulta);
        $datosAnimal = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($datosAnimal as $animal) {
            echo"<div>" . $animal['nombre'] . "</div><br>";
            echo"<div>" . $animal['genero'] . "</div><br>";
        }
        ?>
    </main>
</body>

</html>