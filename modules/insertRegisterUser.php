<?php
include("./comprobarFormRegister.php");
include('./PDO.php');

function insertRegisterUser()
{
    $comprobacion = comprobarFormRegister();
    if ($comprobacion == true) {
        $pdo = conectarBD("admin");
        $acceso = "otro";
        $encryptedPasswd = password_hash($_POST['registerApellidos'], PASSWORD_DEFAULT);
        $insert = $pdo->prepare("INSERT INTO usuarios (nivel_acceso, email, nombre, apellidos, telefono, passwd) VALUES (:nivel_acceso, :email, :nombre, :apellidos, :telefono, :passwd)");
        $insert->bindParam(':nivel_acceso', $acceso);
        $insert->bindParam(':email', $_POST["registerEmail"]);
        $insert->bindParam(':nombre', $_POST["registerName"]);
        $insert->bindParam(':apellidos', $_POST["registerApellidos"]);
        $insert->bindParam(':telefono', $_POST['registerPhone']);
        $insert->bindParam(':passwd', $encryptedPasswd);
        $insert->execute();
        session_start();
        $_SESSION['registro_exitoso'] = "Registro realizado, ya puedes iniciar sesion con tu email";
        header('Location: ../public/register.php');
    } else {
        session_start();
        $_SESSION["error_register"] = "No se han completado todos los campos";
        header("Location: ../public/register.php");
        exit;
    }
}

insertRegisterUser();
?>