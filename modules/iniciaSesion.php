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
        $loginEmail = $_POST['loginEmail'];
        $pdo = conectarBD("admin");
        $consulta = "SELECT id FROM usuarios WHERE email = '$loginEmail';";
        $ejecucion = $pdo->query($consulta);
        $resultado = $ejecucion->fetch(PDO::FETCH_ASSOC);
        $userID = $resultado["id"];
        $_SESSION["userID"] = $userID;
        header("Location: ../index.php");
        exit();
    } else {
        session_start();
        $_SESSION["error_login"] = "Email o contraseña incorrecto";
        header("Location: ../public/login.php");
        exit();
    }
}

iniciaSesion();
?>