<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../libraries/phpmailer/Exception.php');
require '../libraries/phpmailer/PHPMailer.php';
require '../libraries/phpmailer/SMTP.php';

function mailAdopciones()
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
                        <title>Confirmación cita adopcion</title>
                        <style>
                        table {
                            text-align: center;
                            border-collapse: collapse;
                            border: solid 1px black;
                            margin-bottom: 20px;
                            font-size: 16px;
                        }

                        #trRed {
                            background-color: #e63f41;
                            color: white;
                            font-weight: bold;
                            font-size: 18px;
                        }

                        tr:nth-child(even) {
                            background-color: #f2f2f2;
                        }

                        tr:nth-child(odd) {
                            background-color: #ddd;
                        }

                        td {
                            padding: 12px;
                            width: 220px;
                        }

                        .celda {
                            background-color: white;
                        }

                        .celdaDescanso {
                            background-color: #ededed;
                        }

                        .celdaVisitas {
                            border: solid 1px black;
                            background-color: #dc191b;
                        }

                        #horario {
                            display: flex;
                            flex-direction: column;
                            text-align: center;
                            margin-bottom: 50px;
                        }

                        #horario h1 {
                            margin-bottom: 15px;
                        }
                    </style>
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
                    <table id='tablaHorario'>
            
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sábado</th>
                        <th>Domingo</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <td>9:00 AM</td>
                        <td rowspan='4' class='celdaVisitas'>VISITAS</td>
                        <td rowspan='2' class='celda'></td>
                        <td rowspan='4' class='celdaVisitas'>VISITAS</td>
                        <td rowspan='2' class='celda'></td>
                        <td rowspan='4' class='celdaVisitas'>VISITAS</td>
                        <td rowspan='1' class='celda'></td>
                        <td rowspan='1' class='celda'></td>
                    </tr>
                    <tr>
                        <td>10:00 AM</td>
                        <td rowspan='3' class='celdaVisitas'>VISITAS</td>
                        <td rowspan='3' class='celda'></td>
                    </tr>
                    <tr>
                        <td>11:00 AM</td>
                        <td rowspan='2' class='celdaVisitas'>VISITAS</td>
                        <td rowspan='2' class='celdaVisitas'>VISITAS</td>
                    </tr>
                    <tr>
                        <td>12:00 PM</td>
                    </tr>
                    <tr>
                        <td>1:00 PM</td>
                        <td rowspan='3' colspan='7' class='celda'></td>
                    </tr>
                    <tr>
                        <td>2:00 PM</td>
                    </tr>
                    <tr>
                        <td>3:00 PM</td>
                    </tr>
                    <tr>
                        <td>4:00 PM</td>
                        <td rowspan='3' class='celdaVisitas'>VISITAS</td>
                        <td rowspan='2' class='celdaVisitas'>VISITAS</td>
                        <td rowspan='3' class='celdaVisitas'>VISITAS</td>
                        <td rowspan='2' class='celdaVisitas'>VISITAS</td>
                        <td rowspan='3' class='celdaVisitas'>VISITAS</td>
                        <td rowspan='3' class='celda'></td>
                        <td rowspan='5' class='celda'></td>
                    </tr>
                    <tr>
                        <td>5:00 PM</td>
                    </tr>
                    <tr>
                        <td>6:00 PM</td>
                        <td rowspan='3' class='celda'></td>
                        <td rowspan='3' class='celda'></td>
                    </tr>
                    <tr>
                        <td>7:00 PM</td>
                        <td rowspan='2' class='celda'></td>
                        <td rowspan='2' class='celda'></td>
                        <td rowspan='2' class='celda'></td>
                        <td rowspan='2' class='celda'></td>
                    </tr>
                    <tr>
                        <td>8:00 PM</td>
                    </tr>
                </tbody>
            </table>
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