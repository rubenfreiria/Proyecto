<?php

/**
 * [Comprueba que el formilario de register esté cubierto]
 *
 * @return  [int]  [Devuelve true si esta bien o false si no]
 */
function comprobarFormRegister()
{
    if (!empty($_POST['registerEmail']) && !empty($_POST['registerName']) && !empty($_POST['registerApellidos']) && !empty($_POST['registerPhone']) && !empty($_POST['registerPassword'])) {
        return true;
    } else {
        return false;
    }
}

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