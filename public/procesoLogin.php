<?php

/* Funcion para conectarse a la base de datos usando PDO */
function conectarBD() {
  try {
    $pdo = new PDO('mysql:dbname=protectora_teis;host=localhost', 'root', '');
  } catch (PDOException $e) {
    die("ERROR: " . $e->getMessage() . "<br>" . $e->getCode());
  }
  return $pdo;
}

/* Funcion que devuelve true si los campos del formulario están completos */
function comprobarFormLogin()
{
  if (!empty($_POST['loginEmail']) && !empty($_POST['loginPassword'])) {
    return true;
  } else {
    return false;
  }
}

/* Funcion que comprueba si los datos instroducidos en el formulario de login sean correctos
Si son correctos devuelve true, si falla el correo o la contrasenha, devuelve false*/
function comprobarUserEnDB()
{
  $resultadoComprobarLogin = comprobarFormLogin();
  //Llama a la funcion comprobarFormLogin()
  if ($resultadoComprobarLogin == true) {
    $loginEmail = $_POST['loginEmail'];
    $loginpasswd = $_POST['loginPassword'];
    $pdo = conectarBD();
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

$resultadoComprobarUserEnDB = comprobarUserEnDB();
if ($resultadoComprobarUserEnDB == true) {
  echo "Tiro jiji";
  /* Caso de datos introducidos correctos. Continuar haciendo el inicio de sesion */
} else {
  echo "El usuario no existe o las credenciales son incorrectas.";
}
?>