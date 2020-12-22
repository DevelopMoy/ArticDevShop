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
    header("Location: compras.php");
}
?>

<?php
    if ($resSetCarr = $conexionBD->query("SELECT * FROM carrito WHERE idUsuar=" . $_SESSION["userID"])) { //CONSULTA PARA OBTENER TODOS LOS VALORES DEL CARRITO
        while ($filaCarr = $resSetCarr->fetch_assoc()) { //RECORREMOS CADA UNO DE LOS PRODUCTOS DEL CARRITO

        }
    } else {
        $aviso = "Error al actualizar base de datos, al ejecutar consulta";
    }

?>

