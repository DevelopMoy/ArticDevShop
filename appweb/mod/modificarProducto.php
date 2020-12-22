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
    <link rel="stylesheet" href="/appweb/css/styleBC.css">
</head>
<body>
    <?php require_once "initialconfig.php";?>
    <?php include "header.php" ?>
    <dic class="contenedor">
        <div id="cambios">
           <h2>MODIFICAR PRODUCTOS</h2>
            <form action="">
                <label for="id">ID del producto</label><br>
                <input type="number" id="id" required value="0"><br>
                <p id="text">Ingrse un ID por favor</p>
                <button type="button" onclick="mostrar()" id="view">Buscar</button>
            </form><br>
            <div id="productifo">
                
            </div>
            <form action="" id="modificar">
                <label for="nombre">Nombre</label><br>
                <input type="text" id="nombre" name="nombre" required><br>
                <label for="cate">Categoria</label><br>
                <input type="text" id="cate" name="categoria" required><br>
                <label for="precio">Precio</label><br>
                <input type="number" id="precio" name="precio" required><br>
                <label for="cant">Cantidad</label><br>
                <input type="number" id="cant" name="cantidad" required><br>
                <label for="img">Imagen del producto</label><br>
                <input type="file" id="img" name="imagen" required><br>
                <label for="descript">Descripcion</label><br>
                <textarea name="descripcion" id="descript" cols="60" rows="5" placeholder="Maximo __ caracteres" required></textarea><br>
                <input type="submit" value="Modificar">
            </form>
        </div>
        <div id="bajas">
           <h2>ELIMINAR PRODUCTOS</h2>
            <form action="">
                <label for="id">ID del producto</label><br>
                <input type="number" id="id" required min="1"><br>
                <input type="submit" onclick="" value="Eliminar">
            </form><br>
            <div id="productifo">
                <!--<p id="NomPro"></p>
                <p></p>-->
            </div>
        </div>
    </dic>
    
    <?php include "footer.php";?>
    <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
    <script src="/appweb/js/bajaCambio.js"></script>
</body>
</html>