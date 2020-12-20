<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupones Exclusivos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/appweb/css/styles.css">
        <link rel="stylesheet" href="/appweb/css/cuponeraStyles.css">
        <link rel="stylesheet" href="/appweb/css/indexStyles.css">
        <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once "../inc/initialconfig.php";?>
    <?php include "header.php" ?>
    <div id="headCupones">
        <h1>Conoce los cupones exclusivos</h1>
    </div>
    <div class="cupon-container">
        <div class="cupon">
           <div id="porcentajeCupon">
               <h1>15% </h1>
               <button class="botonCupon btn btn-success">Obtener cupon</button>
            </div>
            <div class="infoCupon">
                <h1 id="porcentajeOferta">Por temporada Navideña</h1>
                <h3>Obten 15% de descuento en </h3>
            </div>
        </div>
        <div class="cupon">
           <div id="porcentajeCupon">
               <h1>15% </h1>
               <button class="botonCupon btn btn-success">Obtener cupon</button>
            </div>
            <div class="infoCupon">
                <h1 id="porcentajeOferta">Los jueves de diciembre</h1>
                <h3>Obten 15% de descuento en </h3>
            </div>
        </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>