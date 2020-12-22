<!DOCTYPE html>

<html>
    <head>
        <title>ArticDev Shop</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/appweb/css/styles.css">
        <link rel="stylesheet" href="/appweb/css/indexStyles.css">
        <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png"  href="/appweb/images/favicon-32x32.png">
    </head>

    <body>
        <?php require_once "appweb/inc/initialconfig.php";?>
        <?php include "appweb/mod/header.php" ?>
        <div id="initPage">
            <div id="init1">
                <div id="imagenTarj">
                    <div class="tarj" id="im1">
                        <h3>RTX 2060</h3>
                    </div>
                    <div class="tarj" id="im2">
                        <h3>RX VEGA</h3>
                    </div>
                    <div class="tarj" id="im3">
                        <h3>5500 XT</h3>
                    </div>
                </div>
            </div>
            <h1>Elige tu favorita</h1>
        </div>

        <div id="contPadreMV">
            <div class="contenedor">
                <h1 id="subt1">Lo mas vendido</h1>
                <div class="img-accordion">
                    <div class="img img1">
                        <p>nike potencial 3</p>
                    </div>
                    <div class="img img2">
                        <p>air jordan 1</p>
                    </div>
                    <div class="img img3">
                        <p>Air jordan 7 Retro GC</p>
                    </div>
                    <div class="img img4">
                        <p>air jordan 5</p>
                    </div>
                    <div class="img img5">
                        <p>nike air max</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="how-to">
            <h1 id="subHow">Como comprar?</h1>
            <div class="step">
                <h2 class="subStep">Paso #1</h2>
                <i class="fas fa-cart-plus fa-8x" ></i>
                <h4 class="subStep">Añade a tu carrito los productos deseados</h4>
            </div>
            <div class="step">
                <h2 class="subStep">Paso #2</h2>
                <i class="far fa-credit-card fa-8x"></i>
                <h4 class="subStep">Selecciona completar compra, llena tus datos y selecciona tu metodo de forma de pago</h4>
            </div>
            <div class="step">
                <h2 class="subStep">Paso #3</h2>
                <i class="fas fa-shipping-fast fa-8x"></i>
                <h4 class="subStep">Elige tu metodo de envio  y solo queda esperar.</h4>
            </div>
        </div>

        <?php include "appweb/mod/footer.php";?>
        <script src="/appweb/js/mostSelled.js"></script>
        <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
    </body>
</html>