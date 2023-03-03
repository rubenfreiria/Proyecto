<?php
include('./PDO.php');

function insertAnimal()
{
    if (!empty($_POST['cantidadDonacion']) ) {
        $pdo = conectarBD("admin");
        $insert = $pdo->prepare("INSERT INTO donaciones (fecha_donacion, cantidad, mensaje_donacion, donador_id) VALUES (:fecha_donacion, :cantidad, :donador_id)");
        $insert->bindParam(':fecha_donacion', date('Y-m-d'));
        $insert->bindParam(':cantidad', $_POST["altaDonacionCantidad"]);
        $insert->bindParam(':mensaje_donacion', $_POST["mensajeDonacion"]);
        $insert->bindParam(':id_usuario', $_SESSION["userID"]);
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