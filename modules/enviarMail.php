<?php

function enviarMail($para, $asunto, $mensaje, $headers)
{
    echo "tiro";
    mail($para, $asunto, $mensaje, $headers);
}

enviarMail('ruben.rubbi@gmail.com', "Registro exitoso", "Hola ","From: Ruben");

?>