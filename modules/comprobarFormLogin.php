<?php

/**
 * [Comprueba que el formulario este cubierto]
 *
 * @return  [bool]  [Devuelve true si los campos del formulario de login estan completos]
 */
function comprobarFormLogin()
{
    if (!empty($_POST['loginEmail']) && !empty($_POST['loginPassword'])) {
        return true;
    } else {
        return false;
    }
}
?>