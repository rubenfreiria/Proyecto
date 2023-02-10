<?php
include("./comprobarUserEnBD.php");

/**
 * [Si los datos recibidos en el formulario se corresponden con los de la base
 * de datos, se inicia sesion, si no se redirige nuevamente al formulario de login]
 *
 * @return  [type]  [return description]
 */
function iniciaSesion()
{
    $resultadoComprobarUserEnDB = comprobarUserEnDB();
    if ($resultadoComprobarUserEnDB == true) {
        session_start();
        $_SESSION["email"] = $_POST['loginEmail'];
        echo $_SESSION["email"];
    } else {
        session_start();
        $_SESSION["error_message"] = "Email o contraseña incorrecto";
        header("Location: ../public/login.php");
        exit;
    }
}

iniciaSesion();
?>