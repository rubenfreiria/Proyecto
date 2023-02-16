<?php
include('../modules/PDO.php');
$pdo = conectarBD("admin");

/**
 * Borra los campos seleccionados con checkbox en el formulario de dar de baja
 *Luego redirige a la pagina de bajas, que se actualiza y se puede volver a ver la tabla con las bajas
 * 
 */
if (isset($_POST['borrar'])) {
    foreach ($_POST['borrar'] as $id) {
        $consulta = "DELETE FROM usuarios WHERE id = $id;";
        $resultado = $pdo->query($consulta);
    }
}

header("Location: ../public/administracionBaja.php");
?>