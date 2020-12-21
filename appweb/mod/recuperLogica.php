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
                    hola
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