<?php
    require "../inc/initialconfig.php";

    if ($resultSet = $conexionBD->query("SELECT * FROM usuario WHERE email='".$_POST["emailSrvr"]."'")){
        $arregloDatos = $resultSet -> fetch_assoc();
        if ($arregloDatos["pass_md5"]==md5($_POST["passSrvr"])&&$arregloDatos["intentos"]<3){
            $_SESSION["userEmail"]=$arregloDatos["email"];
            $_SESSION["userNombre"]=$arregloDatos["nombre"];
            $_SESSION["userNickname"]=$arregloDatos["nickname"];
            $_SESSION["userID"]=$arregloDatos["idUsuar"];
            if ($resConsAdm = $conexionBD->query("SELECT * FROM admin WHERE idAdmin=".$_SESSION["userID"])){
                if ($resConsAdm->fetch_assoc()){
                       $_SESSION["admin"]="true";
                }else{
                    $_SESSION["admin"]="";
                }
            }
            $conexionBD->query("UPDATE usuario SET intentos=0 WHERE idUsuar=".$arregloDatos["idUsuar"]);
            header("Location: ../../index.php");
        }else{
            $conexionBD->query("UPDATE usuario SET intentos=".($arregloDatos["intentos"]+1)." WHERE idUsuar=".$arregloDatos["idUsuar"]);
            header("Location: loginView.php?error='Contraseña incorrecta o numero de intentos excedidos'");
        }

    }else{
        header("Location: loginView.php?error='El email no corresponde a ninguna cuenta registrada'");
    }
// SELECT * FROM usuario WHERE email = "serch@gmail.com" AND pass_md5= MD5('s89456O4');
/*
 *
 *
 */
?>