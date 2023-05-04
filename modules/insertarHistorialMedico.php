<?php
include("../modules/PDO.php");

if(isset($_POST['id_usuario']) && isset($_POST['fecha']) && isset($_POST['tratamiento'])){

    $id_animal = $_POST['id_animal'];
    $id_usuario = $_POST['id_usuario'];
    $fecha = $_POST['fecha'];
    $tratamiento = $_POST['tratamiento'];

    $conexion = conectarBD("admin");

    // Preparar la consulta para insertar los datos en la tabla relacion_usuario_animal
    $consulta = "INSERT INTO relacion_usuario_animal (id_usuario, id_animal, fecha, tratamiento) 
    VALUES (:id_usuario, :id_animal, :fecha, :tratamiento)";

    $stmt = $conexion->prepare($consulta);

    // Asignar los valores a los parámetros de la consulta
    $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(':id_animal', $id_animal, PDO::PARAM_INT);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->bindParam(':tratamiento', $tratamiento, PDO::PARAM_STR);

    // Ejecutar la consulta y comprobar si se ha insertado correctamente el registro
    if($stmt->execute()){
        header("Location: ../public/consultarHistorialMedico.php?id=$id_animal");
    }else{
        echo "<p>Error al insertar el registro en la tabla relacion_usuario_animal</p>";
    }

    // Cerrar la conexión a la base de datos
    $conexion = null;

}else{
    echo "<p>No se han recibido correctamente los datos del formulario</p>";
}
?> 