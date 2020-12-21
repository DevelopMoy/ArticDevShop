<html>

<head>
    <title>ArticDev Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/styleRegistro.css">
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php require_once "../inc/initialconfig.php";?>
<?php include "header.php" ?>
<div class="contenedorRegistrar">
        <h1>Crear cuenta</h1>
        <form method="post" action="/appweb/mod/registroLogica.php" id="formRegistro">
            <label for="nickname">Nombre de Usuario:</label>
            <input class="w-75 form-control form-control-sm" id="nickname" required name="nombUsuar" placeholder="Ususario" type="text">
            <label for="correo">Correo:</label>
            <input class="w-75 form-control form-control-sm" id="correo" required name="emailReg" type="email">
            <label for="nombre">Nombre Completo:</label>
            <input class="w-75 form-control form-control-sm" id="nombre" type="text" required name="nombCompReg">
            <label for="contras">Contraseña:</label>
            <input class="w-75 form-control form-control-sm" id="contras" required name="contrasReg" type="password">
            <label for="contrasVer">Ingrese nuevamente su contraseña:</label>
            <input class="w-75 form-control form-control-sm" id="contrasVer" required type="password">
            <p id="avisos"></p>
            <button  class="btn btn-primary" type="button" id="botonRegist">Registrar</button>
        </form>
</div>
<?php include "footer.php";?>
<script src="/appweb/js/registro.js"></script>
<script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
</body>

</html>