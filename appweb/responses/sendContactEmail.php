<?php

$nombClient=$_POST["nombrePers"];
$emailClient=$_POST["clientEmail"];
$asuntClient=$_POST["asuntoClient"];
$msjClient=$_POST["msjCLient"];

if(isset($nombClient)&&isset($emailClient)&&isset($asuntClient)&&isset($msjClient)&&!empty($nombClient)&&!empty($emailClient)&&!empty($asuntClient)&&!empty($msjClient)){
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    $from="admin@articdev.online";
    $to="admin@articdev.online";
    $subject = "Mensaje de Cliente: ".$asuntClient;
    $message='
        <html>
        <head>
          <title>Mensaje Cliente</title>
        </head>
        <body>
          <h1>Mensaje Cliente</h1>
          <p>Enviado el dia '.date("F j, Y, g:i a").'</p>
          <p>Mensaje de: '.$nombClient.'</p>
          <p>'.$msjClient.'</p>
          <p>Contactalo al correo: '.$emailClient.'</p>
        </body>
        </html>
        ';
    $headers="From: ".$from."\r\n";
    $headers  .= 'MIME-Version: 1.0' . "\r\n";
    $headers.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
    mail($to,$subject,$message,$headers);

    $msjCliente='
        <html>
        <head>
          <title>Gracias por su mensaje</title>
        </head>
        <body>
            <img src="https://articdev.online/appweb/images/logoForEmail.jpeg">
            <br>
          <h1><b>Hemos recibido satisfactoriamente su correo de contacto</b></h1>
          <br>
          <p>Enviado el dia '.date("F j, Y, g:i a").'</p>
          <p style="border: 1px solid black; color: #004481;">Le agradecemos su preferencia</p>
          <br>
          <p>Enseguida nos pondremos en contacto con usted</p>
        </body>
        </html>
        ';
    mail($emailClient,"ArticDev Shop, Gracias Por Contactarnos",$msjCliente,$headers);
    header("Location: ../mod/contactanos.php");
}
