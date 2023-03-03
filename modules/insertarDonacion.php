<?php
include('./PDO.php');

function insertAnimal()
{
    if (!empty($_POST['altaAnimalNombre']) && !empty($_POST['altaAnimalGenero']) && !empty($_POST['altaAnimalEspecie']) && !empty($_POST['altaAnimalRaza']) && !empty($_POST['altaAnimalFecha']) && !empty($_FILES["foto"]["tmp_name"])) {
        $nombreAnimal = $_POST['altaAnimalNombre'];
        $nombreArchivo = $nombreAnimal . ".jpg";
        $rutaArchivo = "../media/fotosAdopciones/" . $nombreArchivo;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaArchivo);
        $pdo = conectarBD("admin");
        $insert = $pdo->prepare("INSERT INTO donaciones (nombre, genero, especie, raza, fecha_nacimiento, foto) VALUES (:nombre, :genero, :especie, :raza, :fecha_nacimiento, :foto)");
        $insert->bindParam(':fecha_donacion', $_POST['altaDonacionFecha']);
        $insert->bindParam(':cantidad', $_POST["altaDonacionCantidad"]);
        $insert->bindParam(':genero', $_POST["altaAnimalGenero"]);
        $insert->bindParam(':especie', $_POST["altaAnimalEspecie"]);
        $insert->execute();
        session_start();
        $_SESSION['alta_donacion_exitosa'] = "Donacion registrada con éxito";
        header("Location: ../public/donaciones.php");
    } else {
        session_start();
        $_SESSION["error_alta_donacion"] = "Faltan campos por rellenar";
        header("Location: ../public/donaciones.php");
        exit;
    }
}

insertAnimal();
?>