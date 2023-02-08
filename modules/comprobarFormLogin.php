<?php
function comprobarFormLogin()
{
    if (!empty($_POST['loginEmail']) && !empty($_POST['loginPassword'])) {
        return true;
    } else {
        return false;
    }
}
?>