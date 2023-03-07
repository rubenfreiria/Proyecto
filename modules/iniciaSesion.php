<?php
include("./comprobarUserEnBD.php");

/**
 * Inicia sesión y redirige a la página de inicio
 *
 * @return  void Redirige a la página de inicio si la información de inicio de sesión es correcta, o a la página de login con un mensaje de error
 */
function iniciaSesion()
{
    $resultadoComprobarUserEnDB = comprobarUserEnDB();
    if ($resultadoComprobarUserEnDB == true) {
        session_start();
        $loginEmail = $_POST['loginEmail'];
        $pdo = conectarBD("otro");
        $consulta = "SELECT id, nombre FROM usuarios WHERE email = '$loginEmail';";
        $ejecucion = $pdo->query($consulta);
        $resultado = $ejecucion->fetch(PDO::FETCH_ASSOC);
        $userID = $resultado["id"];
        $userNombre = $resultado["nombre"];
        $_SESSION["userID"] = $userID;
        $_SESSION["userNombre"] = $userNombre;
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