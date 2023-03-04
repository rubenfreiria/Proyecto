<?php
include('./PDO.php');

function insertAnimal()
{
    if (!empty($_POST['altaAnimalNombre']) && !empty($_POST['altaAnimalGenero']) && !empty($_POST['altaAnimalEspecie']) && !empty($_POST['altaAnimalRaza']) && !empty($_POST['altaAnimalFecha']) && !empty($_FILES["foto"]["tmp_name"])) {
        $nombreAnimal = $_POST['altaAnimalNombre'];
        $nombreArchivo = $nombreAnimal . ".jpg";
        $rutaArchivo = "../media/fotosAdopciones/" . $nombreArchivo;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaArchivo);
        $pdo = conectarBD("veterinario");
        $insert = $pdo->prepare("INSERT INTO animales (nombre, genero, especie, raza, fecha_nacimiento, foto) VALUES (:nombre, :genero, :especie, :raza, :fecha_nacimiento, :foto)");
        $insert->bindParam(':nombre', $_POST["altaAnimalNombre"]);
        $insert->bindParam(':genero', $_POST["altaAnimalGenero"]);
        $insert->bindParam(':especie', $_POST["altaAnimalEspecie"]);
        $insert->bindParam(':raza', $_POST['altaAnimalRaza']);
        $insert->bindParam(':fecha_nacimiento', $_POST['altaAnimalFecha']);
        $insert->bindParam(':foto', $rutaArchivo);
        $insert->execute();
        session_start();
        $_SESSION['alta_animal_exitosa'] = "Animal registrado con éxito";
        header("Location: ../public/altaAnimal.php");
    } else {
        session_start();
        $_SESSION["error_alta_animal"] = "Faltan campos por rellenar";
        header("Location: ../public/altaAnimal.php");
        exit;
    }
}

insertAnimal();
?>