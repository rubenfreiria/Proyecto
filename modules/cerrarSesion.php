<?php
unset($_SESSION["userID"]);
session_destroy();
header("Location: ../public/login.php");
exit;
?>