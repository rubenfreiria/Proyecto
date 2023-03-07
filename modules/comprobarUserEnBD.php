<?php
include './comprobarFormLogin.php';
include('./PDO.php');

/**
 * Comprueba si el usuario existe en la base de datos
 *
 * @return  boolean Devuelve true si el usuario existe y las credenciales son correctas, false si el usuario no existe o las credenciales son incorrectas
 */
function comprobarUserEnDB()
{
    $resultadoComprobarLogin = comprobarFormLogin();
    //Llama a la funcion comprobarFormLogin()
    if ($resultadoComprobarLogin == true) {
        $loginEmail = $_POST['loginEmail'];
        $loginpasswd = $_POST['loginPassword'];
        $pdo = conectarBD("otro");
        $consulta = "SELECT * FROM usuarios WHERE email = '$loginEmail';";
        $resultado = $pdo->query($consulta);
        $user = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($resultado->rowCount() > 0 && password_verify($loginpasswd, $user['passwd'])) {
            //El usuario existe y las credenciales son correctas
            return true;
        } else {
            //El usuario no existe o las credenciales son incorrectas
            return false;
        }
    } else {
        echo "Los datos introducidos no son correctos";
        return false;
    }
}
?>