<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>ArticDev Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <link rel="stylesheet" href="/appweb/css/styleAdd.css">
</head>
<body>
    <?php include "header.php" ?>
    <div class="contenedor">
           <div id="info">
              <h1>Agregar Existencia</h1>
               <form action="uploadInventary.php" method="POST">
                   <label for="idProd">ID Producto</label><br>
                   <input type="text" id="idProd" name="idProd" required><br>
                   <label for="cantidad">Cantidad</label><br>
                   <input type="number" name="cantidad" id="cantidad"><br>
                   <label for="precioComp">Precio de Compra</label><br>
                   <input type="number" name="precioComp" id="precioCom"><br>
                   <label for="precVent">Precio de Venta</label><br>
                   <input type="number" name="precioVent" id="precioVent"><br><br>
                   <input class="btn btn-success btn-lg" type="submit" value="Agregar">
               </form>
           </div>
    </div>
    <?php include "footer.php";?>
    <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
</body>
</html>