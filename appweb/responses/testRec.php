<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$from="admin@articdev.online";
$to="fabmoy1866@gmail.com";
$subject = "Recuperar Contraseña Artic Dev";
$message='
                    <html>
                    <head>
                      <title>Recupere su Contraseña</title>
                    </head>
                    <body>
                        <img src="https://articdev.online/appweb/images/logoForEmail.jpeg" alt="logo">
                        <h1 style="color: black; font-size: 28px;">Estimado Cliente, Favor de seguir las instrucciones para recuperar su cuenta, si no lo ha solicitado usted, pongase en contacto con nosotros</h1>
                        <p style="font-size: 24px; color: black;">Ingrese al siguiente enlace y escriba el codigo: </p>
                        <p style="color: black; font-size: 30px;">Codigo</p>
                        <a href="https://articdev.online/appweb/mod/recuUsuar.php" style="font-size: 22px; color: blue;">Presione aquí</a>
                    </body>
                    </html>
                    ';
$headers="From: ".$from."\r\n";
$headers.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($to,$subject,$message,$headers);