<?php
include("../modules/PDO.php");

$conexion = conectarBD("admin");

// Obtener los datos enviados desde el formulario de modificación
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$estado = $_POST['estado'];

// Actualizar los datos del animal en la base de datos
$consulta = "UPDATE animales SET nombre='$nombre', genero='$genero', especie='$especie', raza='$raza', fecha_nacimiento='$fecha_nacimiento', estado='$estado' WHERE id=$id";

if ($conexion->exec($consulta) !== false) {
    // Si la actualización fue exitosa, redirigir de vuelta a la tabla de animales
    header("Location: ../public/historialMedico.php");
    exit();
}
?>