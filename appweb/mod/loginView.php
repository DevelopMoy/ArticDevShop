<html lang="es">

<head>
    <title>ArticDev Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <link rel="stylesheet" href="/appweb/css/styleLogin.css">
    <script src="https://kit.fontawesome.com/66b3831846.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php require_once "../inc/initialconfig.php";?>
<?php include "header.php" ?>
 <div class="contenedor">
        <img class="imagen" src="/appweb/images/fondoIzq.jpg" alt="" style="height: 650px">
        <div class="login">
        <form id="formularioLogin" action="loginLogic.php" method="post">
            <label for="correo">Inicia Sesión</label><br>
            <input name="emailSrvr" class="form-control form-control-sm" id="correo" placeholder="Usuario" type="email" require>
            <input name="passSrvr" id="contras" class="form-control form-control-sm" placeholder="Contraseña" type="password" require>
            
            <div class="captcha">
                <img id="imagenCaptcha"> <span> <button type="button" id="refreshCaptcha" class="btn btn-success"><i class="fas fa-sync-alt"></i></button> </span>
            </div>

            <input  id="textFieldCaptcha" class="form-control form-control-sm w-50" placeholder="Ingrese captcha" type="text"  require>

            <button class="btn btn-primary" id="botonSubmit" type="button">Ingresar</button>
            <p id="avisos"><?php if (isset($_GET["error"])&&!empty($_GET["error"])){echo $_GET["error"];} ?></p>

        </form>
        <div>
        <a href="/appweb/mod/registerView.php"> ¿Aun no tienes cuenta? Presiona aquí</a> <br>
            <a href="recuperar.php">¿Olvidaste tu contraseña?</a>
        </div>
        
        </div>
        
    </div>
    

<?php include "footer.php";?>
<script src="/appweb/js/login.js"></script>
<script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
</body>

</html>