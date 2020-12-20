<?php
require "../inc/initialconfig.php";

if ($resSetCarr=$conexionBD->query("SELECT SUM(cantidad) FROM carrito WHERE idUsuar=".$_SESSION["userID"]." GROUP BY idUsuar;")){
    if ($arregloCarrRS=$resSetCarr->fetch_assoc()){
        $totalProductos=$arregloCarrRS["SUM(cantidad)"];
    }else{
        $totalProductos=0;
    }
}

echo $totalProductos;