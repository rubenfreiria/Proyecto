<?php

/**
 * Comprueba si el formulario de login esta completo
 *
 * @return  boolean Devuelve true si el formulario de login esta completo, false si falta algun campo por cubrir
 */
function comprobarFormRegister()
{
    if (!empty($_POST['registerEmail']) && !empty($_POST['registerName']) && !empty($_POST['registerApellidos']) && !empty($_POST['registerPhone']) && !empty($_POST['registerPassword'])) {
        return true;
    } else {
        return false;
    }
}

/**
 * Comprueba si el email introducido en el formulario de registro ya existe en la base de datos
 *
 * @return  int Devuelve 0 si el email no existe en la base de datos, 1 si faltan campos por cubrir en el formulario de registro y 2 si el email ya existe en la base de datos
 */
function comprobarEmailRegistradoBD()
{
    $devolver = 0;
    $resultadoComprobarRegister = comprobarFormRegister();
    //Los datos del formulario de register estan cubiertos
    if ($resultadoComprobarRegister == true) {
        $registerEmail = $_POST['registerEmail'];
        $pdo = conectarBD("otro");
        $consulta = "SELECT * FROM usuarios WHERE email = '$registerEmail';";
        $ocurrencias = $pdo->query($consulta);
        if ($ocurrencias->rowCount() == 0) {
            // No existe ningun usuario con este email en la BBDD 
            $devolver = 0;
            return $devolver;
        } else {
            //Ya existe un usuario registrado con este email
            $devolver = 2;
            return $devolver;
        }
    } else {
        //Faltan campos por cubrir en el formulario de register
        $devolver = 1;
        return $devolver;
    }
}
?>