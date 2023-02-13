<?php
/**
 * [Se borrar la variable de sesion userID, se finaliza la sesion y se redirige al login]
 */

unset($_SESSION["userID"]);
session_destroy();
header("Location: ../public/login.php");
exit;
?>