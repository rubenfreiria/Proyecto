<?php
/**
 * Funcion que lee la configuracion de los parametros de ficheros XML
 *
 * @param   [xml file]  $fichero_config_BBDD    [fichero xml con los parametros para conectarse a la base de datos
 * @param   [xsd file]  $esquema                [fichero xsd que comprueba que el xml esta bien formado]
 *
 * @return  [array]                             [array con los valores de conexion a la base de datos]
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
 * @param   [string]  $permisos  [cadena que corresponda con los permisos que se deseen acceder a la BBDD]
 *
 * @return  [PDO object]             [return objeto PDO con los permisos selecionados]
 */
function conectarBD($permisos)
{
    try {
        /* Usuarios disponibles para la base de datos, cada uno con
        su fichero de configuracion */
        if ($permisos === "admin") {
            $res = leer_config(dirname(__FILE__) . "/config/configuracionAdmin.xml", dirname(__FILE__) . "/config/configuracion.xsd");
            $pdo = new PDO($res[0], $res[1], $res[2]);
        } else if ($permisos === "veterinario") {
            $res = leer_config(dirname(__FILE__) . "/config/configuracionVeterinario.xml", dirname(__FILE__) . "/config/configuracion.xsd");
            $pdo = new PDO($res[0], $res[1], $res[2]);
        } else if ($permisos === "otro") {
            $res = leer_config(dirname(__FILE__) . "/config/configuracionOtro.xml", dirname(__FILE__) . "/config/configuracion.xsd");
            $pdo = new PDO($res[0], $res[1], $res[2]);
        }
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    } finally {
        $pdo = null;
    }
}
?>