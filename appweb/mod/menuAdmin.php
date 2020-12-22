<?php
    require "../inc/initialconfig.php";
    if( !(isset($_SESSION["admin"])&&!empty($_SESSION["admin"]))){
      header('Location: ../../index.php');  
    }
    if(!(isset($_GET["msg"])&&!empty($_GET["msg"]))){
        $title = "Selecciona una opcion";   
    }else{
        $title = $_GET["msg"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArticDev Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/panelStyles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php include "header.php"?>
    <div class="panelContainer">
        <div><h1 styles="color:white;"><?php echo $title?></h1></div>
        <button class="btn btn-success btn-lg"><a href="modificarProducto.php">Modificar/Eliminar</a></button>
        <button class="btn btn-success btn-lg"><a href="subirProductos.php">Agregar Producto</a></button>
        <button class="btn btn-success btn-lg"><a href="agregarExistenciaProducto.php">Agregar Existencia</a></button>
        <button class="btn btn-success btn-lg"><a href="grafica.php">Grafica</a></button>
    </div>
    <?php include "footer.php"?>
</body>
</html>