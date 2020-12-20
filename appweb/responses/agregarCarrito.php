<?php
require "../inc/initialconfig.php";

if (isset($_GET["prod"])&&!empty($_GET["prod"])&&isset($_GET["cant"])&&!empty($_GET["cant"])){
    $consultaCarr=$conexionBD->query("SELECT * FROM carrito WHERE idProd=".$_GET["prod"]." AND idUsuar=".$_SESSION["userID"]);
    $consultaExist = $conexionBD->query("SELECT IDProducto, SUM(Existencia) AS 'existencia' FROM existenciaGeneral WHERE IDProducto=".$_GET["prod"]." GROUP BY IDProducto");

    if($arrayCarr=$consultaCarr->fetch_assoc()){//SI HAY DE ESTE PRODUCTO EN EL CARRITO
        if ($arrayExist=$consultaExist->fetch_assoc()){
            if ($arrayCarr["cantidad"]+$_GET["cant"]<=$arrayExist["existencia"]){
                if($conexionBD->query("UPDATE carrito SET cantidad=".($arrayCarr["cantidad"]+$_GET["cant"])." WHERE idUsuar=".($_SESSION["userID"])." AND idProd=".$_GET["prod"])){
                    echo "exito";
                }else{
                    echo "errorBaseDatos";
                }
            }else{
                echo "errorCantidad";
            }
        }
    }else{//NO HAY EN EL CARRITO
        if ($arrayExist=$consultaExist->fetch_assoc()){
            if($_GET["cant"]<=$arrayExist["existencia"]){
                if($conexionBD->query("INSERT INTO carrito (idUsuar,idProd,cantidad) VALUES(".$_SESSION["userID"].",".$_GET["prod"].",".$_GET["cant"].")")){
                    echo "exito";
                }else{
                    echo "errorBaseDatos";
                }
            }else{
                echo "errorCantidad";
            }
        }
    }

    /*if ($arreglo = $consulta->fetch_assoc()){
            // "SELECT IDProducto, SUM(Existencia) AS 'existencia' FROM existenciaGeneral WHERE IDProducto=".$_GET["prod"]." GROUP BY IDProducto"
            //INSERTAR NUEVO A BD $conexionBD->query("INSERT INTO carrito (idUsuar,idProd,cantidad) VALUES(".$_SESSION["userID"].",".$_GET["prod"].",".$_GET["cant"].")")

    }*/

}else{
    echo "errorServer";
}

