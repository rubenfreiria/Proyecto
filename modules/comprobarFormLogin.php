<?php

/**
 * Comprueba si los campos del formulario de login estan completos
 *
 * @return  boolean Devuelve true si el formulario de login esta completo, false si falta algun campo por cubrir
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