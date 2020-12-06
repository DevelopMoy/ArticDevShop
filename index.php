<!DOCTYPE html>

<html>
    <head>
        <title>ArticDev Shop</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/appweb/css/styles.css">
    </head>

    <body>
        <?php require_once "appweb/inc/initialconfig.php";?>
        <?php include "appweb/mod/header.php" ?>
        <div class="slideshow-container">

            <div class="mySlides fade">
                <img src="appweb/images/660M.jpg" style="width:800px; height: 600px;">
            </div>

            <div class="mySlides fade">
                <img src="appweb/images/IMG_5236.jpg" style="width:800px; height: 600px;">
            </div>

            <div class="mySlides fade">
                <img src="appweb/images/Test-GPU.jpg" style="width:800px; height: 600px;">
            </div>

        </div>
        <br>

        <div class="punto">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

        <script src="appweb/js/carrusel.js"></script>
        <?php include "appweb/mod/footer.php";?>
    </body>
</html>