<?php
require "../inc/initialconfig.php";
//VERIFICAR EL CARRITO
$aviso = "";
// SE VERIFICA QUE EL CARRITO CONTENGA EXISTENCIAS REALES, DE LO CONTRARIO SE MODIFCA LA CANTIDAD DEL CARRITO AL MAXIMO ACTUAL
if ($resSetCarr = $conexionBD->query("SELECT * FROM carrito WHERE idUsuar=" . $_SESSION["userID"])) { //CONSULTA PARA OBTENER TODOS LOS VALORES DEL CARRITO
    while ($filaCarr = $resSetCarr->fetch_assoc()) { //RECORREMOS CADA UNO DE LOS PRODUCTOS DEL CARRITO
        if ($resSetExist = $conexionBD->query("select IDProducto,SUM(Existencia) from existenciaGeneral WHERE IDProducto=" . $filaCarr["idProd"] . " GROUP BY IDProducto")) {//CONSULTA PARA SABER LA EXISTENCIA GENERAL DE ESE PRODUCTO
            if ($filaSetExist = $resSetExist->fetch_assoc()) {
                if ($filaCarr["cantidad"] <= $filaSetExist["SUM(Existencia)"]) {
                    //SI ESTA OK ESA PARTE DEL CARRITO1866
                } else {
                    //NO HAY SUFICIENTE EXISTENCIA
                    if ($conexionBD->query("UPDATE carrito SET cantidad=" . $filaSetExist["SUM(Existencia)"] . " WHERE IDProd=" . $filaCarr["idProd"] . " AND IDUsuar=" . $_SESSION["userID"])) {
                        $aviso = "Algunos de los productos no cuentan con suficiente existencia, por lo tanto se modifico la cantidad a el maximo de existencia actual";
                    } else {
                        $aviso = "Error al actualizar carrito";
                    }
                }
            }
        }

    }
} else {
    $aviso = "Error al actualizar base de datos, al ejecutar consulta";
}

if($aviso!=""){
    echo "<script>alert('La existencia de uno o mas productos ha cambiado, será redirigido al carrito ');</script>";
    //header("Location: compras.php");
}
?>

<?php
//preparar variables
$cuponCD = "NULL";
$impuestosCD = 0;
$gastosEnvio = 0;

    $idVenta="";
    //CREAR VENTA
    if($conexionBD->query("INSERT INTO venta (comprador,fechaCompra) VALUES (".$_SESSION['userID'].",'".date('Y-m-d')."')")){
        if ($resSqnmv=$conexionBD->query("select numVenta from venta ORDER BY numVenta DESC limit 1;")){
            if ($rowNffd=$resSqnmv->fetch_assoc()){
                $idVenta=$rowNffd["numVenta"];
            }

        }else{
            echo "<script>alert('Error al procesar compra, consulta ultimo idVenta');</script>";
            //header("Location: compras.php");
        }

    }else{
        echo "<script>alert('Error al procesar compra, solicitud agregar venta nueva');</script>";
        //header("Location: compras.php");
    }

    // CREAR ENLACE inventario_venta
    /*if ($resSetCarr = $conexionBD->query("SELECT * FROM carrito WHERE idUsuar=" . $_SESSION["userID"])) { //CONSULTA PARA OBTENER TODOS LOS VALORES DEL CARRITO
        while ($filaCarr = $resSetCarr->fetch_assoc()) { //RECORREMOS CADA UNO DE LOS PRODUCTOS DEL CARRITO
            $prodSolicit=$filaCarr["idProd"];
            $existenciaSolicit = $filaCarr["cantidad"];

            if ($resSTExtc = $conexionBD->query("select * from existenciaGeneral WHERE IDProducto=".$prodSolicit." AND Existencia>0 ORDER BY Precio desc;")){
                while ($filaresSTEX=$resSTExtc->fetch_assoc()){
                    if ($existenciaSolicit<=$filaresSTEX["Existencia"]){//EL LOTE SATISFACE TODA LA PETICION DE PRODUCTOS
                        if ($conexionBD->query("INSERT INTO inventario_venta (numLote,idVenta,cantidad,cupon,gastosEnvio,impuestos) VALUES (".$filaresSTEX["NumeroLote"].",".$idVenta.",".$existenciaSolicit.",".$cuponCD.",".$gastosEnvio.",".$impuestosCD.")")){
                            break;
                        }else{
                            echo "<script>alert('error fatal al crear la venta :c');</script>";
                            //header("Location: compras.php");
                        }
                    }else{
                        if ($existenciaSolicit>$filaresSTEX["Existencia"]){// EL LOTE NO ALCANZA A SATISFACER LA DEMANDA
                            if ($conexionBD->query("INSERT INTO inventario_venta (numLote,idVenta,cantidad,cupon,gastosEnvio,impuestos) VALUES (".$filaresSTEX["NumeroLote"].",".$idVenta.",".$filaresSTEX["Existencia"].",".$cuponCD.",".$gastosEnvio.",".$impuestosCD.")")){
                                $existenciaSolicit-=$filaresSTEX["Existencia"];
                            }else{
                                echo "<script>alert('error fatal al crear la venta :c');</script>";
                                //header("Location: compras.php");
                            }
                        }
                    }
                }
            }else{
                echo "<script>alert('Error al procesar compra, SOLICITUD EXISTENCIA GENERAL');</script>";
                //header("Location: compras.php");
            }
        }
    } else {
        echo "<script>alert('Error al procesar compra, solicitud productos carrito');</script>";
        //header("Location: compras.php");
    }*/
$band=false;
if ($consGenCarr=$conexionBD->query("SELECT * FROM carrito WHERE idUsuar=".$_SESSION["userID"])){//CONSULTA DEL CARRITO
    while($filaGC = $consGenCarr->fetch_assoc()){ //ITERARA TODOS LOS PRODUCTOS A SOLICITAR DEL CARRITO
        $band=true;
        $productoSolicitado=$filaGC["idProd"];
        $totalSolicitados = $filaGC["cantidad"];
        if($consExGC=$conexionBD->query("select * from existenciaGeneral EG JOIN producto P ON EG.IDProducto=P.idProd WHERE IDProducto=".$productoSolicitado." ORDER BY Precio DESC")){//SOLICITAR EXISTENCIA POR LOTES
            while ($iterableGC=$consExGC->fetch_assoc()){ //ITERARA POR LOS DIFERENTES LOTES
                if ($totalSolicitados<$iterableGC["Existencia"]){
                    /*echo "<div id=productoCarrito>";
                    echo "<p class='nameProducto'>".$iterableGC["nombre"]."</p>";
                    echo '<input type="number" name="cantidadProductos" id="p'.$iterableGC["IDProducto"].'l'.$iterableGC["NumeroLote"].'" min="0" class="cantidProdC" value="'.$totalSolicitados.'">';
                    echo "<p>$".$iterableGC["Precio"]."</p>";
                    echo "<p>$".($iterableGC["Precio"]*$totalSolicitados)."</p>";
                    echo "</div>";*/
                    if ($conexionBD->query("INSERT INTO inventario_venta (numLote,idVenta,cantidad,cupon,gastosEnvio,impuestos) VALUES (".$iterableGC["NumeroLote"].",".$idVenta.",".$totalSolicitados.",".$cuponCD.",".$gastosEnvio.",".$impuestosCD.")")){
                        break;
                    }else{
                        echo "<script>alert('error fatal al crear la venta :c');</script>";
                        //header("Location: compras.php");
                    }
                    $totalSolicitados=0;
                }else{
                    if($iterableGC["Existencia"]>0){
                        /*
                        echo "<div id=productoCarrito>";
                        echo "<p class='nameProducto'>".$iterableGC["nombre"]."</p>";
                        echo '<input type="number" name="cantidadProductos" id="p'.$iterableGC["IDProducto"].'l'.$iterableGC["NumeroLote"].'" class="cantidProdC" min="0" value="'.$iterableGC["Existencia"].'">';
                        echo "<p>$".$iterableGC["Precio"]."</p>";
                        echo "<p>$".($iterableGC["Precio"]*$iterableGC["Existencia"])."</p>";
                        echo "</div>";
                        */
                        if ($conexionBD->query("INSERT INTO inventario_venta (numLote,idVenta,cantidad,cupon,gastosEnvio,impuestos) VALUES (".$iterableGC["NumeroLote"].",".$idVenta.",".$iterableGC["Existencia"].",".$cuponCD.",".$gastosEnvio.",".$impuestosCD.")")){

                        }else{
                            echo "<script>alert('error fatal al crear la venta :c');</script>";
                            //header("Location: compras.php");
                        }
                        $totalSolicitados=$totalSolicitados-$iterableGC["Existencia"];
                    }
                }
                if($totalSolicitados==0){
                    break;
                }
            }
            if($totalSolicitados>0){
                $aviso="Alguno de los productos seleccionados no tiene la suficiente existencia";
            }
        }

    }
}

    echo "<script>alert('COMPRA EXITOSA');</script>";
    //header("Location: compras.php");
?>

