<?php
include('PDO.php');

/**
 * Recibe el id del usuario y devuelve su nivel de acceso
 *
 * @return  string Devuelve el nivel de acceso del usuario
 */
function comprobarNivelAcceso()
{
    if (isset($_SESSION["userID"])) {
        $userID = $_SESSION["userID"];
        $pdo = conectarBD("otro");
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