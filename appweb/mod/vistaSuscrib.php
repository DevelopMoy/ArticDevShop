<?php
if($_SESSION["status"]=="exito"){
    $respuesta="Gracias por suscribirse al boletin";
}else{
    $respuesta="Ha ocurrido un error al suscribirse al boletin, favor de verificar los datos";
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
    <link rel="icon" type="image/png"  href="/appweb/images/favicon-32x32.png">
</head>
<body>
<?php include "header.php"?>
<div class="panelContainer">
    <div><h1 styles="color:white;"><?php echo $respuesta?></h1></div>
</div>
<?php include "footer.php"?>
</body>
</html>
