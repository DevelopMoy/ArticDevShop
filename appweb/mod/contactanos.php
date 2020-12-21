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
</head>
<body>
    <?php require "../inc/initialconfig.php"?>
    <?php include "header.php" ?>

    <div class="contenedor">
        <div class="contacto">
            <h1>Contactanos</h1>
            <form action="" id="contactanos">
                <label for="nombre">Nombre:</label> <br>
                <input type="text" id="nombre" name="nombre"> <br>
                <label for="correo">Correo:</label><br>
                <input type="email" id="correo" name="correo"><br>
                <label for="asunto">Asunto:</label><br>
                <input type="text" id="asunto" name="correo"><br>
                <label for="msj">Mensaje:</label><br>
                <textarea name="mensaje" id="msj" cols="33" rows="5"></textarea><br><br>
                <input type="submit" value="Enviar" id="btn1">
            </form>
        </div>
        <div class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3701.9153753630417!2d-102.27764659959757!3d21.89933425442287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429ee3f6b3e4741%3A0xf9ab66f87d409165!2sAntonio%20Machado%20208-156%2C%20Sta%20Anita%201ra%20Secc%2C%2020169%20Aguascalientes%2C%20Ags.!5e0!3m2!1ses-419!2smx!4v1607729742994!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" id="fra"></iframe>
        </div>
    </div>
    <div class="contenedor2">
        <p>Nos puedes encontrar en calle Antonio Machado 208-156 colonia Sta Anita 1ra Secc,Aguascalientes, Ags. C.P. 20169 </p>
    </div>
    <?php include "footer.php";?>
</body>
</html>