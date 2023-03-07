<?php
/**
 * Cierra la sesion y redirige a la pagina de login
 */

unset($_SESSION["userID"]);
session_destroy();
header("Location: ../public/login.php");
exit;
?>