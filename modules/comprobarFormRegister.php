<?php
function comprobarFormRegister()
{
    if (!empty($_POST['registerEmail']) && !empty($_POST['registerName']) && !empty($_POST['registerApellidos']) && !empty($_POST['registerPhone']) && !empty($_POST['registerPassword'])) {
        return true;
    } else {
        return false;
    }
}
?>