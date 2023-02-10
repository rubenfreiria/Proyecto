<?php
include './comprobarFormLogin.php';
include('./PDO.php');
/* Funcion que comprueba si los datos instroducidos en el formulario de login sean correctos
Si son correctos devuelve true, si falla el correo o la contrasenha, devuelve false*/
function comprobarUserEnDB()
{
    $resultadoComprobarLogin = comprobarFormLogin();
    //Llama a la funcion comprobarFormLogin()
    if ($resultadoComprobarLogin == true) {
        $loginEmail = $_POST['loginEmail'];
        $loginpasswd = $_POST['loginPassword'];
        $pdo = conectarBD("admin");
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