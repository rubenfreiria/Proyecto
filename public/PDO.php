<?php
/* Funcion para conectarse a la base de datos usando PDO */
function conectarBD()
{
    try {
        $pdo = new PDO('mysql:dbname=protectora_teis;host=localhost', 'root', '');
    } catch (PDOException $e) {
        die("ERROR: " . $e->getMessage() . "<br>" . $e->getCode());
    }
    return $pdo;
}
?>