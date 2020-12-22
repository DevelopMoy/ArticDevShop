<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArticDev Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/styleCarrito.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png"  href="/appweb/images/favicon-32x32.png">
</head>
<body>
    <?php require "../inc/initialconfig.php" ?>
    <?php include "header.php"?>
    <div class="contenedor">
        <table>
            <tr class="cabecera">
                <th>Imagen</th>
                <th>Descripcion del articulo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total parcial</th>
                <th>Retirar</th>
            </tr>
            <!--Seccion de productos agregados al carrito -->
            <tr class="contenido">
                <td id="foto"><img src="" alt="" class="imgPro"></td>
                <td>
                    <p id="descript">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </td>
                <td>
                    <p id="presio">$200.00</p>
                </td>
                <td class="cant">
                    <input type="number" min="0">
                </td>
                <td>
                    <p id="parcial">$200.00</p>
                </td>
                <td class="boton">
                    <button id="eliminar" type="button">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            <!--Seccion de productos agregados al carrito -->
            <tr>
                <td colspan="6">
                    <p id="total">Total: $200.00</p>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" id="seguir"><i class="far fa-arrow-alt-circle-left"></i> Seguir comprando</button>
                </td>
                <td colspan="2">
                    <button type="button" id="vaciar">Vaciar carrito</button>
                </td>
                <td colspan="3">
                    <button type="button" id="comprar">Complete su orden <i class="far fa-check-circle"></i></button>
                </td>
            </tr>
        </table>
    </div>
    <?php include "footer.php"?>
</body>
</html>