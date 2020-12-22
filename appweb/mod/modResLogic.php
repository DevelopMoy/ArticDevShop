<?php
require "../inc/initialconfig.php";

if(isset($_POST["emailRec"])&&!empty($_POST["emailRec"])&&isset($_POST["codRecup"])&&!empty($_POST["codRecup"])&&isset($_POST["newPass"])&&!empty($_POST["newPass"])){

    if ($queryRs=$conexionBD->query("select recContras FROM usuario WHERE email='".$_POST["emailRec"]."'")){
        if ($rs = $queryRs->fetch_assoc()){
            if ($rs["recContras"]==$_POST["codRecup"]){
                if ($conexionBD->query("UPDATE usuario SET pass_md5 = md5 ('".$_POST["newPass"]."') WHERE email='".$_POST["emailRec"]."'")){
                    header("Location: modReseteo.php?state=success");
                }else{
                    header("Location: modReseteo.php?state=failbd");
                }
            }else{
                header("Location: modReseteo.php?state=fail");
            }
        }else{

            header("Location: modReseteo.php?state=fail");
        }
    }else{

        header("Location: modReseteo.php?state=fail");
    }
}else{

    header("Location: modReseteo.php?state=failbd");
}