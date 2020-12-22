<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArticDev Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <link rel="stylesheet" href="/appweb/css/finVent.css">
    <link rel="stylesheet" href="/appweb/css/comprasStyles.css">
    <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/panelStyles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php require "../inc/initialconfig.php" ?>
<?php include "header.php"?>

<?php //VERIFICAR EL CARRITO
$aviso = "";
// SE VERIFICA QUE EL CARRITO CONTENGA EXISTENCIAS REALES, DE LO CONTRARIO SE MODIFCA LA CANTIDAD DEL CARRITO AL MAXIMO ACTUAL
if ($resSetCarr=$conexionBD->query("SELECT * FROM carrito WHERE idUsuar=".$_SESSION["userID"])){ //CONSULTA PARA OBTENER TODOS LOS VALORES DEL CARRITO
    while ($filaCarr=$resSetCarr->fetch_assoc()){ //RECORREMOS CADA UNO DE LOS PRODUCTOS DEL CARRITO
        if($resSetExist =$conexionBD->query("select IDProducto,SUM(Existencia) from existenciaGeneral WHERE IDProducto=".$filaCarr["idProd"]." GROUP BY IDProducto")){//CONSULTA PARA SABER LA EXISTENCIA GENERAL DE ESE PRODUCTO
            if($filaSetExist=$resSetExist->fetch_assoc()){
                if($filaCarr["cantidad"]<=$filaSetExist["SUM(Existencia)"]){
                    //SI ESTA OK ESA PARTE DEL CARRITO1866
                }else{
                    //NO HAY SUFICIENTE EXISTENCIA
                    if($conexionBD->query("UPDATE carrito SET cantidad=".$filaSetExist["SUM(Existencia)"]." WHERE IDProd=".$filaCarr["idProd"]." AND IDUsuar=".$_SESSION["userID"])){
                        $aviso="Algunos de los productos no cuentan con suficiente existencia, por lo tanto se modifico la cantidad a el maximo de existencia actual";
                    }else{
                        $aviso="Error al actualizar carrito";
                    }
                }
            }
        }

    }
}else{
    $aviso="Error al actualizar base de datos, al ejecutar consulta";
}
?>
<div id="contMP">
    <form id="contPadFV">
        <div id="subCtFV">

            <div id="descComprFV">
                <div id="titulosCarrito">
                    <h1 class="nameProducto">Nombre</h1>
                    <h1>Cantidad</h1>
                    <h1>Precio Unitario</h1>
                    <h1>Subtotal</h1>
                </div>
                <?php /*<div class="prodFV">
                <h1>nombre producto</h1>
                <h1>15</h1>
                <h1>434543</h1>
                <h1>434543</h1>
            </div>*/
                ?>
                <?php
                //GENERAR CARRITO EN BASE A LO QUE SE SOLICITA Y A LOS PRECIOS POR LOTE
                $band=false;
                $acum=0;
                if ($consGenCarr=$conexionBD->query("SELECT * FROM carrito WHERE idUsuar=".$_SESSION["userID"])){//CONSULTA DEL CARRITO
                    while($filaGC = $consGenCarr->fetch_assoc()){ //ITERARA TODOS LOS PRODUCTOS A SOLICITAR DEL CARRITO
                        $band=true;
                        $productoSolicitado=$filaGC["idProd"];
                        $totalSolicitados = $filaGC["cantidad"];
                        if($consExGC=$conexionBD->query("select * from existenciaGeneral EG JOIN producto P ON EG.IDProducto=P.idProd WHERE IDProducto=".$productoSolicitado." ORDER BY Precio DESC")){//SOLICITAR EXISTENCIA POR LOTES
                            while ($iterableGC=$consExGC->fetch_assoc()){ //ITERARA POR LOS DIFERENTES LOTES
                                if ($totalSolicitados<$iterableGC["Existencia"]){
                                    echo "<div id=productoCarrito>";
                                    echo "<p class='nameProducto'>".$iterableGC["nombre"]."</p>";
                                    echo '<input readonly type="number" name="cantidadProductos" id="p'.$iterableGC["IDProducto"].'l'.$iterableGC["NumeroLote"].'" min="0" class="cantidProdC" value="'.$totalSolicitados.'">';
                                    echo "<p>$".$iterableGC["Precio"]."</p>";
                                    echo "<p>$".($iterableGC["Precio"]*$totalSolicitados)."</p>";
                                    $acum+=($iterableGC["Precio"]*$totalSolicitados);
                                    echo "</div>";
                                    $totalSolicitados=0;
                                }else{
                                    if($iterableGC["Existencia"]>0){
                                        echo "<div id=productoCarrito>";
                                        echo "<p class='nameProducto'>".$iterableGC["nombre"]."</p>";
                                        echo '<input readonly type="number" name="cantidadProductos" id="p'.$iterableGC["IDProducto"].'l'.$iterableGC["NumeroLote"].'" class="cantidProdC" min="0" value="'.$iterableGC["Existencia"].'">';
                                        echo "<p>$".$iterableGC["Precio"]."</p>";
                                        echo "<p>$".($iterableGC["Precio"]*$iterableGC["Existencia"])."</p>";
                                        $acum+=($iterableGC["Precio"]*$iterableGC["Existencia"]);
                                        echo "</div>";
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


                if(!$band){
                    echo "<p style='color: gray; margin: 28px 0 28px 0'>El carrito esta vacio, agrega productos para comenzar</p>";
                }
                ?>
            </div>

            <?php echo "<p id='areaTotal'> Total antes de impuestos: $ $acum </p>"?>
            <p id="alertaMsj"><?php echo $aviso ?></p>
        </div>

        <div id="partePagos">
            <p>Elija su tipo de pago</p>
            <input required type="radio" checked id="pagTarj" class="pag" name="tipoPag" value="tarjetaCred">
            <label for="tarjetaCred">Tarjeta de Credito</label>
            <input required type="radio" id="pagOx" class="pag" name="tipoPag" value="pagOxxo">
            <label for="pagOxxo">OXXO</label>
            <p>Tipo de envio</p>
            <input required type="radio" id="tipoEnvio" name="tipEnvio" value="expressEnv">
            <label for="expressEnv">Envio express (24 hrs)</label>
            <input required type="radio" id="tipoEnvio" name="tipEnvio" value="gratuit">
            <label for="gratuit">Gratuito (5-6 dias)</label>
        </div>

        <div id="parteTarjetV">
            <div id="pagoOxxo">
                <p>Pago en OXXO</p>
                <p>Favor de dictar al cajero el siguiente codigo</p>
                <p><?php echo rand(1111111111,9999999999)?></p>
            </div>
            <div id="pagoBanco">
                <label for="numTarj">Numero de Tarjeta</label>
                <input id="numTarj" type="number" required name="numeroTarj">
                <label for="titulName">Nombre del titular</label>
                <input id="titulName" required type="text" name="nombTitular">
                <label for="codigSeg">Codigo de seguridad</label>
                <input id="codigSeg" required type="number" name="codSeg">
            </div>
            <div id="datosDomicil">
                <p>Datos de envio</p>
                <label for="nombreRecib">Nombre de quien recibe</label>
                <input required type="text" id="nombreRecib" name="nombEnvi">
                <label for="calle">Calle y Fraccionamiento</label>
                <input id="calle" name="callFracc" type="text" required>
                <label for="numDomic">Numero</label>
                <input id="numDomic" type="number" required name="numDomic">
                <label for="ciudDomic">Ciudad</label>
                <input id="ciudDomic" type="text" required name="ciudDomici">
                <label for="estDomic">Estado</label>
                <input id="estDomic" type="text" required name="estadDomic">
            </div>
            <div id="botonEnviar">
                <input type="submit">
            </div>
        </div>
    </form>
</div>

<?php include "footer.php"?>
<script src="../js/ventaFinal.js"></script>
</body>
</html>