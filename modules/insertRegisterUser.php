<?php
include("./comprobarFormRegister.php");
include('./PDO.php');

function insertRegisterUser()
{
    $comprobacion = comprobarEmailRegistradoBD();
    if ($comprobacion == 0) {
        $pdo = conectarBD("admin");
        $acceso = "otro";
        $encryptedPasswd = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);
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
        if ($comprobacion == 1) {
            session_start();
            $_SESSION["error_register"] = "No se han completado todos los campos";
            header("Location: ../public/register.php");
            exit;
        } elseif ($comprobacion == 2) {
            session_start();
            $_SESSION["error_register"] = "Ya existe un usuario registrado con este email";
            header("Location: ../public/register.php");
            exit;
        }
    }
}

insertRegisterUser();
?>