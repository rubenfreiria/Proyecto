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
        /* En produccion usar otro usuario con menos permisos que admin */
        $pdo = conectarBD("admin");
        $consulta = "SELECT nombre, genero, raza, fecha_nacimiento, foto FROM animales;";
        $resultado = $pdo->query($consulta);
        $datosAnimal = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        /* Genera automaticamente el contenido recogiendo todos los datos de la base de datos */
        $contador = 0;
        foreach ($datosAnimal as $animal) {
            echo "<div>" . $datosAnimal[$contador]["nombre"] . "</div>";
            $contador++;
        }
        ?>
    </main>
</body>

</html>