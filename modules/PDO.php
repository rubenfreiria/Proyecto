<?php
/* Funcion para conectarse a la base de datos usando PDO */
function leer_config($fichero_config_BBDD, $esquema)
{
    /*
     * $fichero_config_BBDD es la ruta del fichero con los datos de conexión a la BBDD
     * $esquema es la ruta del fichero XSD para validar la estructura del fichero anterior
     * Si el fichero de configuración existe y es válido, devuelve un array con tres
     * valores: la cadena de conexión, el nombre de usuario y la clave.
     * Si no encuentra el fichero o no es válido, lanza una excepción.
     */

    $config = new DOMDocument();
    $config->load($fichero_config_BBDD);
    $res = $config->schemaValidate($esquema);
    if ($res === FALSE) {
        throw new InvalidArgumentException("Revise el fichero de configuración");
    }
    $datos = simplexml_load_file($fichero_config_BBDD);
    $ip = $datos->xpath("//ip");
    $nombre = $datos->xpath("//nombre");
    $usu = $datos->xpath("//usuario");
    $clave = $datos->xpath("//clave");
    $cad = sprintf("mysql:dbname=%s;host=%s", $nombre[0], $ip[0]);
    $resul = [];
    $resul[] = $cad;
    $resul[] = $usu[0];
    $resul[] = $clave[0];
    return $resul;
}

function conectarBD($permisos)
{
    try {
        /* Usuarios disponibles para la base de datos, cada uno con
        su fichero de configuracion */
        if ($permisos === "admin") {
            $res = leer_config(dirname(__FILE__) . "./config/configuracionAdmin.xml", dirname(__FILE__) . "./config/configuracion.xsd");
            $pdo = new PDO($res[0], $res[1], $res[2]);
        }
        if ($permisos === "veterinario") {
            $res = leer_config(dirname(__FILE__) . "./config/configuracionVeterinario.xml", dirname(__FILE__) . "./config/configuracion.xsd");
            $pdo = new PDO($res[0], $res[1], $res[2]);
        }
        if ($permisos === "otro") {
            $res = leer_config(dirname(__FILE__) . "./config/configuracionOtro.xml", dirname(__FILE__) . "./config/configuracion.xsd");
            $pdo = new PDO($res[0], $res[1], $res[2]);
        }
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}
?>