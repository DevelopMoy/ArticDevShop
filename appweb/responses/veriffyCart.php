<?php
require "../inc/initialconfig.php";

if (isset($_GET["data"])&&!empty($_GET["data"])){
    $strData = $_GET["data"];
    $indL=0;
    for ($i=0;$i<strlen($strData);$i++){
        if ($strData[$i]=="l"){
            $indL=$i;
            break;
        }
    }
    $idProd=substr($strData,1,$indL-1);
    $numLote = substr($strData,$indL+1,strlen($strData));
    if ($resSet=$conexionBD->query("select existencia from existenciaGeneral WHERE IDProducto=".$idProd." AND NumeroLote=".$numLote)){
        if ($row=$resSet->fetch_assoc()){
            echo $row["Existencia"];
        }
    }
}

if(isset($_GET["change"])&&isset($_GET["new"])){
    $strData = $_GET["change"];
    $indL=0;

    for ($i=0;$i<strlen($strData);$i++){
        if ($strData[$i]=="l"){
            $indL=$i;
            break;
        }
    }
    $idProd=substr($strData,1,$indL-1);

    $nuevoValor=$_GET["new"]; //NUEVO VALOR

    if($nuevoValor<=0){
        if($conexionBD->query("DELETE FROM carrito WHERE idUsuar=".$_SESSION["userID"]." AND idProd=".$idProd)){
            echo "ok";
        }else{
            echo "error al borrar registro";
        }
    }else{
        if ($conexionBD->query("UPDATE carrito SET cantidad=".$nuevoValor." WHERE idUsuar=".$_SESSION["userID"]." AND idProd=".$idProd)){
            echo "ok";
        }else{
            echo "error al ejecutar consulta";
        }
    }

}