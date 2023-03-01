<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../libraries/phpmailer/Exception.php');
require '../libraries/phpmailer/PHPMailer.php';
require '../libraries/phpmailer/SMTP.php';

function mailRegistro()
{

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->IsSMTP();
    // cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug = 0;
    //	Establece la autentificación SMTP. Por defecto a False
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    //	Establece el servidor SMTP. Pueden ser varios separados por ;
    $mail->Host = 'iesteis-es.correoseguro.dinaserver.com';
    $mail->Port = 587;

    // Introducir usuario de correo completo
    $mail->Username = 'protectora@b07.daw2d.iesteis.gal';
    // Introducir clave
    $mail->Password = 'ProtectoraTeis1.';
    $mail->SetFrom('protectora@b07.daw2d.iesteis.gal', 'protectora@b07.daw2d.iesteis.gal');
    /*
     * Para especificar el asunto. Utilizamos la función mb_convert_encoding para que muestre
     * correctamente los acentos.
     */
    $str = 'Confiramacion de registro';
    $mail->Subject = mb_convert_encoding($str, 'UTF-8');
    $nombre = $_POST['registerName'];
    $apellidos = $_POST['registerApellidos'];
    $email = $_POST['registerEmail'];
    $telefono = $_POST['registerPhone'];
    $texto = "<html>
                    <head>
                        <title>Confirmación de registro</title>
                    </head>
                    <body>
                        <p>Estimado/a $nombre $apellidos,</p>
                        <p>Gracias por registrarse en nuestra web.</p>
                        <p>A continuación, le recordamos los detalles de su registro:</p>
                        <ul>
                            <li>Nombre completo: $nombre $apellidos</li>
                            <li>Correo electrónico: $email</li>
                            <li>Teléfono: $telefono</li>
                        </ul>
                        <p>Atentamente,</p>
                        <p>El equipo de la Protectora de Animales de Teis</p>
                    </body>
                </html>";
    // cuerpo
    $mail->MsgHTML($texto);
    /* Envio Horario
    $mail->addAttachment('../media/horario/horario_protectoraTeis.pdf');
    */
    
    /*
     * AddAddress	void AddAddress ( $address, $name )	
     * Añade una dirección de destino del mensaje. El parámetro $name es opcional
     */
    $mail->AddAddress($_POST['registerEmail'], $_POST['registerName']);
    $mail->Send();
}
?>