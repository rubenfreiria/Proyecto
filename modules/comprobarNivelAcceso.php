<?php
include('PDO.php');
function comprobarNivelAcceso()
{
    if (isset($_SESSION["userID"])) {
        $userID = $_SESSION["userID"];
        $pdo = conectarBD("admin");
        $consulta = "SELECT nivel_acceso FROM usuarios WHERE id = $userID;";
        $ejecucion = $pdo->query($consulta);
        $resultado = $ejecucion->fetch(PDO::FETCH_ASSOC);
        $permisos = $resultado["nivel_acceso"];
        return $permisos;
    } else {
        return "otro";
    }
}
?>