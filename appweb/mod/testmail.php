<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$from="admin@articdev.online";
$to="fabmoy1866@gmail.com";
$subject = "Esto es una prueba";
$message="Holaaaa";
$headers="From:".$from;
mail($to,$subject,$message,$headers);
echo  "todo good";