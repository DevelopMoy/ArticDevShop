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
          <p>Enviado el dia'.date('l \t\h\e jS').'</p>
          <p>Mensaje de: '.$nombClient.'</p>
          <p>'.$msjClient.'</p>
          <p>Contactalo al correo: '.$emailClient.'</p>
        </body>
        </html>
        ';
    $headers="From: ".$from."\r\n";
    $headers.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
    mail($to,$subject,$message,$headers);
    header("Location: ../mod/contactanos.php");
}
