<!DOCTYPE html>

<html>
<head>
    <title>ArticDev Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <link rel="stylesheet" href="/appweb/css/mainShopStyles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"  href="/appweb/images/favicon-32x32.png">
</head>

<body>
<?php require_once "../inc/initialconfig.php";?>
<?php include "header.php" ?>
<div id="areaTienda">
<?php
    
   echo '<div id="areaCateg">

            <div class="list-group"> 
                <h6>Categorias</h6>' ;   
   echo     '<label class="list-group-item">
                        <input class="form-check-input me-1 allCheckB" type="checkbox" value="0">
                        '."Todas".'
                  </label>';
    if ($resQuery = $conexionBD->query("SELECT * FROM categoria")){
        while ($row = $resQuery->fetch_assoc()){

            echo "<label class='list-group-item'>
                        <input class='form-check-input me-1 campoCatx' type='checkbox' value='".$row["id"]."'>
                        ".$row["nombre"]."
                  </label>";
        }
    }else{
        header("Location: /appweb/mod/errorScreen.php?error='error en la consulta'");
    }
    echo '</div>
        </div>';

        //GENERAR AREA PRODUCTOS
    echo "<div id='areaProductos'>";
    if (!isset($_GET["categ"])||empty($_GET["categ"])){
        $categ="*";
    }else{
        $categ=$_GET["categ"];
    }

    $firstBand=true;
    $anterior="";

    if ($queryProd=$conexionBD->query("SELECT * FROM existenciaGeneral WHERE Existencia>0 AND(SELECT visible FROM producto WHERE producto.idProd=existenciaGeneral.IDProducto) ORDER BY IDProducto, Precio DESC;")){
        while ($row = $queryProd->fetch_assoc()){
            if ($firstBand){
                $anterior=$row;
                $firstBand=false;
                //Contenedor tarjeta de producto
                echo "<a class='prod-container' href='/appweb/mod/prodIndiv.php?idProd=".$row["IDProducto"]."' >";
                echo "<div >";
                    echo "<img class='img-prod' src = '/appweb/images/prodPics/1.png' width='300' height='250' >";
                echo "<h3 class='nombreProducto'>" .$row["nombre"]."</h3>";
                echo "<p class='precio'> $" .$row["Precio"]."</p> </div>";
                echo "</a>";
            }else{
                if (!($anterior["IDProducto"]===$row["IDProducto"])){
                    $anterior=$row;
                    echo "<a class='prod-container' href='/appweb/mod/prodIndiv.php?idProd=".$row["IDProducto"]."' >";
                    echo "<div >";
                    echo "<img class='img-prod' src = '/appweb/images/prodPics/".$row["IDProducto"].".png' width='300' height='250' >";
                    echo "<h3 class='nombreProducto'>" .$row["nombre"]."</h3>";
                    echo "<p class='precio'> $" .$row["Precio"]."</p> </div>";
                    echo "</a>";
                }
            }
        }
    }
    echo "</div>";
?>
</div>

<?php include "footer.php";?>
<script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
<script src="/appweb/js/categories.js"></script>
</body>
</html>
