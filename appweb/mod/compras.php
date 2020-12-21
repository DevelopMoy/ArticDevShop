<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/appweb/css/styles.css">
        <link rel="stylesheet" href="/appweb/css/comprasStyles.css">
        <link rel="stylesheet" href="/appweb/css/indexStyles.css">
        <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once "../inc/initialconfig.php";?>
    <?php include "header.php" ?>
    <div id="carritoContainer">
        <div id="titulosCarrito">
            <h1 class="nameProducto">Nombre</h1>
        <h1>Cantidad</h1>
        <h1>Precio Unitario</h1>
        <h1>Subtotal</h1>
        </div>
        <?php
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

        <?php
            //GENERAR CARRITO EN BASE A LO QUE SE SOLICITA Y A LOS PRECIOS POR LOTE
            $band=false;
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
                                echo '<input type="number" name="cantidadProductos" id="p'.$iterableGC["IDProducto"].'l'.$iterableGC["NumeroLote"].'" min="0" class="cantidProdC" value="'.$totalSolicitados.'">';
                                echo "<p>$".$iterableGC["Precio"]."</p>";
                                echo "<p>$".($iterableGC["Precio"]*$totalSolicitados)."</p>";
                                echo "</div>";
                                $totalSolicitados=0;
                            }else{
                                if($iterableGC["Existencia"]>0){
                                    echo "<div id=productoCarrito>";
                                    echo "<p class='nameProducto'>".$iterableGC["nombre"]."</p>";
                                    echo '<input type="number" name="cantidadProductos" id="p'.$iterableGC["IDProducto"].'l'.$iterableGC["NumeroLote"].'" class="cantidProdC" min="0" value="'.$iterableGC["Existencia"].'">';
                                    echo "<p>$".$iterableGC["Precio"]."</p>";
                                    echo "<p>$".($iterableGC["Precio"]*$iterableGC["Existencia"])."</p>";
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

        <div id="botonesCarritoContainer">
           <button class="btn">Completar Orden</button>
        </div>
        <div style="margin-top: 15px; color: #cccccc;" <p id="seccAvis"><?php echo $aviso?></p></div>
       
    </div>

    <?php include "footer.php";?>
    <script src="/appweb/js/scriptsCarrito.js"></script>
</body>
</html>