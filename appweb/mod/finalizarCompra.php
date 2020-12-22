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
$descCupon =0;

if($_POST["tipEnvio"]=="expressEnv"){
    $gastosEnvio=400;
}

//validar cupón
if ($rssCupon=$conexionBD->query("select * from cupon where idCupon=".$_POST["cuponDc"])){
    if ($arrayCupRss=$rssCupon->fetch_assoc()){
        $cuponCD=$arrayCupRss["idCupon"];

        if ($rsCpn = $conexionBD->query("SELECT porcentaje FROM cupon WHERE idCupon=".$_POST["cuponDc"])){
            if ($rowcpnf=$rsCpn->fetch_assoc()){
                $descCupon=$rowcpnf["porcentaje"];
            }
        }
    }

}

//validar impuestos
if ($_POST["mispaises"]=="Mexico(IVA-16)"){
    $impuestosCD=16;
}else{
    $impuestosCD=23;
}

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
$acumUl=0;
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
                    $acumUl+=(($iterableGC["Precio"]*$totalSolicitados));
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
                        $acumUl+=($iterableGC["Precio"]*$iterableGC["Existencia"]);
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

    //LIMPIAR CARRITO
    if($conexionBD->query("delete from carrito WHERE idUsuar=".$_SESSION["userID"])){

    }




    //header("Location: compras.php");
    //GENERAR RECIBO
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ArticDev Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <link rel="stylesheet" href="/appweb/css/styleContactanos.css">
    <link rel="stylesheet" href="/appweb/css/styleAdd.css">
</head>
<body>
<?php include "header.php" ?>
<?php
    /*echo "<p> $acumUl </p>"//NUESTRO TOTAL
    echo "($impuestosCD/100)*$acumUl";//IMPUESTS
    echo "$gastosEnvio";//GASTOS ENVIO-->*/
?>
<div class="contenedor">
    <!--<div id="imgpro">
        <img src="prueba.jpg" alt="">
    </div>-->
    <div id="info">
        <h1>RECIBO</h1>
        <form action="">
            <label for="nombre">GRACIAS POR SU COMPRA!</label><br><br>
            <label for="nombre">A continuación los detalles de su pedido</label><br>
            <label for="nombre">Datos de pago</label><br>
            <label for="nombre">METODO DE PAGO: <?php
                    if (isset($_POST["numTarj"])){
                        echo "PAGO CON TARJETA DE CREDITO";
                    }else{
                        echo "Pago en sucursal OXXO";
                    }
                ?></label><br>
            <label for="nombre">Su pedido será enviado a</label><br>
            <label for="nombre"><?php echo $_POST["callFracc"]?></label><br>
            <label for="nombre"><?php echo $_POST["ciudDomici"]." ".$_POST["estadDomic"]?></label><br>
            <label for="nombre"><?php echo $_POST["mispaises"]?></label><br>
        </form>
        <h1>SUBTOTAL:<?php echo $acumUl?> </h1>
        <h1>IMPUESTOS:<?php echo ($impuestosCD/100)*$acumUl;?> </h1>
        <h1>GASTOS ENVIO:<?php echo $gastosEnvio?> </h1>
        <h1>DESCUENTO CUPON:<?php echo ($descCupon/100)*$acumUl?> </h1>
        <h1>---TOTAL:<?php echo ($acumUl)+(($impuestosCD/100)*$acumUl)+($gastosEnvio)-(($descCupon/100)*$acumUl)?></h1>


        <?php
        $emailPersona="admin@articdev.online";
        if ($rstEmaxd = $conexionBD->query("SELECT email FROM usuario WHERE idUsuar=".$_SESSION["userID"])){
            if ($resRowArr = $rstEmaxd->fetch_assoc()){
                $emailPersona = $resRowArr["email"];
            }
        }

        ini_set('display_errors',1);
        error_reporting(E_ALL);
        $from="admin@articdev.online";
        $to=$emailPersona;
        $subject = "Recibo de su visita a nuestra pagina";
        $message='
        <html>
        <head>
          <title>Mensaje Cliente</title>
        </head>
        <body>
          <h1>Le enviamos su recibo con los datos correspondientes</h1>
          <p>Enviado el dia '.date("F j, Y, g:i a").'</p>
          <h1>SUBTOTAL:'.$acumUl.'</h1>
        <h1>IMPUESTOS:'.(($impuestosCD/100)*$acumUl).' </h1>
        <h1>GASTOS ENVIO: '.$gastosEnvio.'</h1>
        <h1>DESCUENTO CUPON:'.(($descCupon/100)*$acumUl).' </h1>
        <h1>---TOTAL: '.(($acumUl)+(($impuestosCD/100)*$acumUl)+($gastosEnvio)-(($descCupon/100)*$acumUl)).'</h1>
          <p>GRACIAS POR SU COMPRA!</p><br><br>
        </body>
        </html>
        ';
        $headers="From: ".$from."\r\n";
        $headers  .= 'MIME-Version: 1.0' . "\r\n";
        $headers.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to,$subject,$message,$headers);

        ?>
    </div>
</div>

<?php include "footer.php";?>
</body>
</html>


