<?php
  
  if (isset($_POST['loginEmail'])&&isset($_POST['loginPassword'])) {
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];
    
    
  } else {
    echo 'No se han recibido datos del formulario';
  }
?>