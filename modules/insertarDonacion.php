<?php
include('./PDO.php');

function insertarDonacion()
{
    if (!empty($_POST['cantidadDonacion']) ) {
        $fecha  = date('Y-m-d');
        $pdo = conectarBD("admin");
        $insert = $pdo->prepare("INSERT INTO donaciones (fecha_donacion, cantidad, mensaje_donacion, donador_id) VALUES (:fecha_donacion, :cantidad, :mensaje_donacion, :donador_id)");
        $insert->bindParam(':fecha_donacion', $fecha);
        $insert->bindParam(':cantidad', $_POST["cantidadDonacion"]);
        $insert->bindParam(':mensaje_donacion', $_POST["mensajeDonacion"]);
        $insert->bindParam(':donador_id', $_SESSION["userID"]);
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

insertarDonacion();
?>