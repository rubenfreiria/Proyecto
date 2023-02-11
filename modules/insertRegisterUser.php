<?php
include("./comprobarFormRegister.php");

function insertRegisterUser()
{
    $comprobacion = comprobarFormRegister();
    if ($comprobacion == true) {
        $_SESSION["registerEmail"] = $_POST['registerEmail'];
        echo $_SESSION["registerEmail"];
    } else {
        session_start();
        $_SESSION["error_register"] = "No se han completado todos los campos";
        header("Location: ../public/register.php");
        exit;
    }
}

insertRegisterUser();
?>