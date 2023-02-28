<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("phpmailer/src/Exception.php");
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

try {
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->IsSMTP();
// cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug = 0;
//	Establece la autentificación SMTP. Por defecto a False
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
//	Establece el servidor SMTP. Pueden ser varios separados por ;
    $mail->Host = "iesteis-es.correoseguro.dinaserver.com";
    $mail->Port = 587;

// Introducir usuario de correo completo
    $mail->Username = "protectora@b07.daw2d.iesteis.gal";
// Introducir clave
    $mail->Password = "ProtectoraTeis1.";
    $mail->SetFrom('protectora@b07.daw2d.iesteis.gal', 'protectora@b07.daw2d.iesteis.gal');
    /*
     * Para especificar el asunto. Utilizamos la función mb_convert_encoding para que muestre
     * correctamente los acentos.
     */
    $str="Envío foto de playa";
    $mail->Subject = mb_convert_encoding($str,'UTF-8');
    $texto = '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pregunta</title><meta charset = "UTF-8"></head><body>	
    <form action = "" method = "POST">	
            ¿Te está gustando el curso de PHP?<br>	
            <input type="radio" id="si" name="eleccion" value="Si">
            <label for="si">SÍ</label><br>
            <input type="radio" id="no" name="eleccion" value="No">
            <label for="no">NO</label><br>									
            <input type = "submit" name="Enviar" value="Enviar">
        </form>
    </body>
</html>';
// cuerpo
    $mail->MsgHTML($texto);
    /*
     * bool AddAttachment ( $path, $name, [$encoding = "base64"], [$type = "application/octet-stream"] )	
     * Añade un fichero adjunto al mensaje. Retorna false si el fichero no pudo ser encontrado.
     * $path, es la ruta del archivo puede ser relativa al script php (no a la clase PHPMailer) 
     * o una ruta absoluta. Se aconseja usar rutas relativas
     * $name, nombre del fichero
     * $encoding, tipo de codificación. Se aconseja dejar la predeterminada
     * $type, el valor por defecto funciona con cualquier clase de archivo. Se puede 
     * usar un tipo específico como por ejemplo image/jpeg
     */
    $mail->addAttachment("foto_playa.jpg");

// destinatario
    $address = "rubenfrteis@gmail.com";
    /*
     * AddAddress	void AddAddress ( $address, $name )	
     * Añade una dirección de destino del mensaje. El parámetro $name es opcional
     */
    $mail->AddAddress($address, "rubenfrteis@gmail.com");

    /*
     * bool Send ( )	
     * Envía el mensaje, devuelve false si ha habido algún problema. 
     * Consultando la propiedad ErrorInfo se puede saber cuál ha sido el problema
     */
    $resul = $mail->Send();

    if (!$resul) {
        echo "Error" . $mail->ErrorInfo;
    } else {
        echo "<br>Enviado";
    }
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error de correo : " . $mail->ErrorInfo;
}
?>