<?php
    require "../inc/initialconfig.php";
    echo $_SESSION["userNombre"];
    if(isset($_SESSION["userNombre"])&&!empty($_SESSION["userNombre"])){
        $_SESSION["userEmail"]="";
        $_SESSION["userNombre"]="";
        $_SESSION["userNickname"]="";
        $_SESSION["userID"]="";
        $_SESSION["admin"]="";
        echo "entre";
    }
   header("Location: ../../index.php");