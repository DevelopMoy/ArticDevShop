<?php
    function volver($msg){
        header("Location: menuAdmin.php?msg="."$msg");
    }
    require "../inc/initialconfig.php";
    $id=$_POST["idProd"];
    $cantidad=$_POST["cantidad"];
    $precioComp=$_POST["precioComp"];
    $precioVent=$_POST["precioVent"];
    echo $id." ".$cantidad." ".$precioComp." ".$precioVent; 
    if($consulta=$conexionBD->query("INSERT INTO inventario (idProd,cantidad,precComp,precVent) VALUES($id,$cantidad,$precioComp,$precioVent);")){
        volver("Existencia agregada satisfactoriamente");
    }else{
        volver("Ha ocurrido un error, no fue posible agregar existencia");
    }
?>