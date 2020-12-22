<?php
if (isset($_POST["correo"])&&!empty($_POST["correo"])){
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    $from="admin@articdev.online";
    $to=$_POST["correo"];
    $subject = "Gracias por suscribirse a nuestra pagina";
    $message='
        <html>
        <head>
        </head>
        <body>
          <h1>Estimado cliente, le agradecemos su preferencia y como muestra de agradecimiento le ofrecemos:</h1>
          <p>Un cupon para su proxima compra, recibirá un 35% de descuento</p><br>
          <p style="color: #004481; border: 1px solid black; margin: 10px;">44353</p><br>
          <p>Sin mas por el momento, le deseamos que pase felices fiestas con su familia y seres queridos.</p>
        </body>
        </html>
        ';
    $headers="From: ".$from."\r\n";
    $headers  .= 'MIME-Version: 1.0' . "\r\n";
    $headers.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
    mail($to,$subject,$message,$headers);
    
    header("Location: ../mod/vistaSuscrib.php?status=exito");
}else{

    header("Location: ../mod/vistaSuscrib.php?status=fail");

}