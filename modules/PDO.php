<?php
 /**
  * Lee el fichero de configuración y devuelve un array con los datos de la conexión
  *
  * @param   string  $fichero_config_BBDD  fichero de configuracion XML
  * @param   string  $esquema              esquema de validacion XSD
  *
  * @return  array datos de la conexion
  */
function leer_config($fichero_config_BBDD, $esquema)
{
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
    $resul = [$cad, $usu[0], $clave[0]];
    return $resul;
}


/**
 * Recibe una cadena con los permisos de la conexion que se desean
 * Devuelve un objeto pdo listo para lanzar consultas a la base de datos con el usuario indicado
 *
 * @param   string  $permisos   cadena con los permisos de la conexion que se desean
 *
 * @return  object  objeto pdo listo para lanzar consultas a la base de datos con el usuario indicado
 */
function conectarBD($permisos)
{
    try {
        // Usuarios disponibles para la base de datos, cada uno con su fichero de configuracion 
        if ($permisos === "admin") {
            $res = leer_config(dirname(__FILE__) . "/config/configuracionAdmin.xml", dirname(__FILE__) . "/config/configuracion.xsd");
            $pdo = new PDO($res[0], $res[1], $res[2], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } else if ($permisos === "veterinario") {
            $res = leer_config(dirname(__FILE__) . "/config/configuracionVeterinario.xml", dirname(__FILE__) . "/config/configuracion.xsd");
            $pdo = new PDO($res[0], $res[1], $res[2], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } else if ($permisos === "otro") {
            $res = leer_config(dirname(__FILE__) . "/config/configuracionOtro.xml", dirname(__FILE__) . "/config/configuracion.xsd");
            $pdo = new PDO($res[0], $res[1], $res[2], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        }
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    } finally {
        $pdo = null;
    }
}
?>^^