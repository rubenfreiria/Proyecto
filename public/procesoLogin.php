<?php
/* Funcion que devuelve true si los campos del formulario están completos */
function comprobarFormLogin()
{
  if ($_POST['loginEmail'] != "" && $_POST['loginPassword'] != "") {
    return true;
  } else {
    return false;
  }
}

function comprobarUserEnDB()
{
  $resultadoComprobarLogin = comprobarFormLogin();
  if ($resultadoComprobarLogin == true) {
    $loginEmail = $_POST['loginEmail'];
    $loginpasswd = $_POST['loginPassword'];
    try {
      $pdo = new PDO('mysql:dbname=protectora_teis;host=localhost', 'root', '');
    } catch (PDOException $e) {
      die("ERROR: " . $e->getMessage() . "<br>" . $e->getCode());
    }
    $consulta = "SELECT * FROM usuarios WHERE email = '$loginEmail' AND passwd = '$loginpasswd';";
    $resultado = $pdo->query($consulta);
    if ($resultado->rowCount() > 0) {
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

$resultadoComprobarUserEnDB = comprobarUserEnDB();
if ($resultadoComprobarUserEnDB == true) {
  /* Caso de datos introducidos correctos. Continuar haciendo el inicio de sesion */
} else {
  echo "El usuario no existe o las credenciales son incorrectas.";
}
?>