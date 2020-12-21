<?php

require "../inc/initialconfig.php";

if(isset($_POST["emailRec"])&&!empty($_POST["emailRec"])){
    if ($resSet = $conexionBD->query("SELECT * FROM usuario WHERE email='".$_POST["emailRec"]."'")){
        if ($row = $resSet->fetch_assoc()){
            //GENERAR CODIGO RECUPERACION
            $codigoRecu=rand(11111,99999);
            if($conexionBD->query("UPDATE usuario SET recContras=".$codigoRecu." WHERE email='".$_POST["emailRec"]."'")){
                //ENVIAR EMAIL
                ini_set('display_errors',1);
                error_reporting(E_ALL);
                $from="admin@articdev.online";
                $to=$_POST["emailRec"];
                $subject = "Recuperar Contraseña Artic Dev";
                $message='
                    <html>
                    <head>
                      <title>Recupere su Contraseña</title>
                    </head>
                    <body>
                        <img src="https://articdev.online/appweb/images/logoForEmail.jpeg">
                      <h1 style="font-size: 26px; color: black;">Estimado Cliente, Favor de seguir las instrucciones para recuperar su cuenta, si no lo ha solicitado usted, pongase en contacto con nosotros</h1>
                      <p style="font-size: 24px; color: #004481;">Ingrese al siguiente enlace y escriba el codigo: </p>
                      <p style="color: #00b7ff; font-size: 30px; margin: 5px; border: 1px solid black; border-radius: 5px; width: 25%;">'.strval($codigoRecu).'</p>
                      <a href="https://articdev.online/appweb/mod/recuUsuar.php" style="font-size: 22px; color: #004481;">Presione aquí</a>
                    </body>
                    </html>
                    ';
                $headers="From: ".$from."\r\n";
                $headers.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
                mail($to,$subject,$message,$headers);
            }else{
                header("Location: recuperar.php?state=failbd");
            }
            header("Location: recuperar.php?state=success");
        }else{


            header("Location: recuperar.php?state=fail");
        }
    }
}