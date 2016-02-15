<?php

require "assets/lib/PHPMailer/PHPMailerAutoload.php";
/* Instancia PHPMailer */

/* Variables */
$para = "miguel.camargo@proyeccioncarga.com";
$copia = "miguel.camargo@proyeccioncarga.com";
$copiaoculta = "miguel.camargo@proyeccioncarga.com";
$port = 25;
$host = 'mail.proyeccioncarga.com';
$username = 'noreply@proyeccioncarga.com';
$password = 'Procarga2016**$$';
$mail = new PHPMailer;
/* Configuración SMTP */
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = $port;
$mail->Host = $host;
$mail->Username = $username;
$mail->Password = $password;

/* Captura datos del formulario */
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$asunto = $_POST['asunto'];
$mensaje = nl2br($_POST['mensaje']);
/* Validación y envio del mensaje */
if ($nombre == "" || $email == "" || $telefono == "" || $asunto == "" || $mensaje == ""):
    echo '<div  id="respuesta" >Todos los campos son requeridos para el envio</div>';
else:
    $mail->isHtml(true);
    $mail->addAddress($para);
    $mail->addAddress($copia);
    $mail->addBCC($copiaoculta);
    $mail->From = $username;
    $mail->FromName = 'Contacto Proyección Carga';
    $mail->Subject = '[' . strtoupper($nombre) . ']: ' . $asunto;
    $mail->Body = '<h3><strong>Proyección Carga ha recibido un contacto desde su sitio web</strong></h3>'
            . '<br><br>'
            . '<b>Fecha: </b>'.date_default_timezone_get().'<br>'
            . '<b>Nombre: </b>'.$nombre.'<br>'
            . '<b>E-mail: </b>'.$email.'<br>'
            . '<b>Teléfono: </b>'.$telefono.'<br>'
            . '<b>Asunto: </b>'.$asunto.'<br>'
            . '<b>Mensaje: </b><br>'
            . '<p align="justify">'.$mensaje.'</p>';
    $mail->CharSet = 'UTF-8';
    $mail->send();
    smtpClose();
    echo "<script type=\"text/javascript\">alert('Mensaje temporal. Hemos recibido su mensaje. nos pondremos en contacto lo mas pronto posible.');</script>";
endif;
?>