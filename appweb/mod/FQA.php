<!DOCTYPE html>
<html lang="es">
<head>
    <title>ArticDev Shop</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/appweb/css/styles.css">
    <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="icon" type="image/png"  href="/appweb/images/favicon-32x32.png">
</head>
<body>
<?php require "../inc/initialconfig.php"?>
<?php include "header.php" ?>

<section id="preguntas">
     <h1 id="title">Preguntas Frecuentes</h1>
      <div class="con-accordion">
          <div class="accordion-item">
              <header onclick="handleClick(event)">
                  <div class="con-icon">
                      <i class="fas fa-times"></i>
                  </div>
                  <h3>
                      ¿Que metodos de pago manejan?
                  </h3>
              </header>
              <div class="accordion-content">
                  <p>
                      Puedo pagar depositando en nuestra cuenta de banco o en su OXXO más cercano. 
                  </p>
              </div>
          </div>
          <div class="accordion-item">
              <header onclick="handleClick(event)">
                  <div class="con-icon">
                      <i class="fas fa-times"></i>
                  </div>
                  <h3>
                      ¿Número de núcleos del core i5?
                  </h3>
              </header>
              <div class="accordion-content">
                  <p>
                        El procesador Intel core i5 9a Socket 1151 2.8 Ghz cuenta con 6 núcleos. 
                  </p>
              </div>
          </div>
          <div class="accordion-item">
              <header onclick="handleClick(event)">
                  <div class="con-icon med">
                      <i class="fas fa-times"></i>
                  </div>
                  <h3>
                      ¿Qué es BIOS?
                  </h3>
              </header>
              <div class="accordion-content">
                  <p>
                      BIOS son siglas en inglés: Basic Input-Output System o Sistemas básico de entrada y salida.
                      Viene incorporado con el chip de la placa base, es decir, no es un programa que se encuentre en el disco rigido.
                      La BIOS almacena la informacion básica de la computadora, guarda los datos del día y la hora, el cache, configuraciones de discos, etc.
                  </p>
              </div>
          </div>
          <div class="accordion-item">
              <header onclick="handleClick(event)">
                  <div class="con-icon">
                      <i class="fas fa-times"></i>
                  </div>
                  <h3>
                      ¿Los productos cuentan con garantia?
                  </h3>
              </header>
              <div class="accordion-content">
                  <p>
                      Todos nuestros productos cuentan con una garantia de hasta 10 años.
                  </p>
              </div>
          </div>
          <div class="accordion-item">
              <header onclick="handleClick(event)">
                  <div class="con-icon">
                      <i class="fas fa-times"></i>
                  </div>
                  <h3>
                      ¿Cuentan con envío internacional?
                  </h3>
              </header>
              <div class="accordion-content">
                  <p>
                      Disponemos de envios a EE.UU, Canadá, Inglaterra, China y Brasil. 
                  </p>
              </div>
          </div>
          <div class="accordion-item">
              <header onclick="handleClick(event)">
                  <div class="con-icon">
                      <i class="fas fa-times"></i>
                  </div>
                  <h3>
                      ¿Cómo puedo recuperar mi cuenta?
                  </h3>
              </header>
              <div class="accordion-content">
                  <p>
                      Ingresa al apartado marcado en la ventana del login y sigue las instrucciones
                  </p>
              </div>
          </div>
      </div>
    
  </section>
   
    <script>
        function handleClick(evt){
            const content = evt.target.nextElementSibling;
            if(!evt.target.parentNode.classList.contains('open')){
                content.style.height = `${content.scrollHeight}px`;
                evt.target.parentNode.classList.add('open');
            }else{
                content.style.height=`0px`;
                evt.target.parentNode.classList.remove('open');
            }
        }
    </script>
    <?php include "footer.php"?>
</body>
</html>