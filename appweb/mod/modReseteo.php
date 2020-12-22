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
    <link rel="icon" type="image/png"  href="/appweb/images/favicon-32x32.png">
    <link rel="stylesheet" href="/appweb/css/styleRecuperar.css">
</head>
<body>
<?php require_once "../inc/initialconfig.php";?>
<?php include "header.php" ?>
<div class="contenedor">
    <p class="text">Proporcione los siguientes datos para recuperar su contraseña</p>
    <form action="modResLogic.php" method="post" id="recuperar">
        <label for="correo" >Correo electronico:</label><br>
        <input type="email" required name="emailRec" id="correo"><br>
        <label for="codigoVer" >Codigo verificación:</label><br>
        <input type="text" required name="codRecup" id="codigoVer"><br>
        <label for="nuevaContras">Ingrese Nueva Contraseña:</label><br>
        <input type="password" required name="newPass" id="nuevaContras"><br>
        <input type="submit" value="Enviar" id="enviar">

    </form>
    <?php
    if (isset($_GET["state"])&&!empty($_GET["state"])){
        if($_GET["state"]=="success"){
            echo "<p class='text' style='margin-top: 20px'>Exito! Se ha cambiado su contraseña</p>";
        }else{
            if($_GET["state"]=="fail"){
                echo "<p class='text' style='margin-top: 20px'>Error, los datos ingresados no son validos</p>";
            }else{
                if($_GET["state"]=="failbd"){
                    echo "<p class='text' style='margin-top: 20px'>Error al enviar codigo base datos</p>";
                }
            }
        }
    }
    ?>
</div>

<?php include "footer.php";?>
<script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
</body>