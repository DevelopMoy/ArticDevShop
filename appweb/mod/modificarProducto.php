<?php
    function volver($msg){
        header("Location: menuAdmin.php?msg="."$msg");
    }
    require "../inc/initialconfig.php";
    $band=false;
    if( !(isset($_SESSION["admin"])&&!empty($_SESSION["admin"]))){
      header('Location: ../../index.php');  
    }
    if(isset($_POST['idProdMod'])){
        $idAux = $_POST['idProdMod'];
        if($consultaId = $conexionBD -> query("SELECT idProd From producto;")){
            while($arrayId = $consultaId->fetch_assoc()){
                if($arrayId["idProd"]==$idAux){
                    $band=true;
                }
            }
            if($band){
              if($consultaProd = $conexionBD -> query("SELECT * from producto where idProd = $idAux")){
                  while($arrayProd = $consultaProd->fetch_assoc()){
                      $nombreProd = $arrayProd["nombre"];
                      $categoriaProd = $arrayProd["idCateg"];
                      $descripcionProd = $arrayProd["descripcion"];
                  }
              }
            }else{
                volver("ID No encontrado, verifique de nuevo");
            }
        }
    }else if(isset($_POST['idProdSQL'])){
        
        $id=$_POST['idProdSQL'];
        $nombre=$_POST['nombreMod'];
        $categoria = $_POST['categoria'];
        $descripcion = $_POST['descripcion'];
       if($consultaMod = $conexionBD ->query("UPDATE producto SET idCateg = $categoria, nombre = '$nombre', descripcion= '$descripcion' where idProd = $id;")){
            volver("Listones");
        }else{
          echo '<h1>'.mysqli_error($conexionBD).'</h1>';
        }
    }else if(isset($_POST['idProdDelete'])){
        $idDelete = $_POST['idProdDelete'];
        $cantidad = 0;
        $existencia = 0;
        if($lotesDelete = $conexionBD -> query("SELECT numLote, idProd, cantidad FROM inventario where idProd=$idDelete;")){
            while($vectorDelete= $lotesDelete -> fetch_assoc()){
                $cantidad+=$vectorDelete["cantidad"];
            }   
            if($existenciaProd = $conexionBD -> query("SELECT * from existencia where idproduct=$idDelete;")){
                while($vectorExistencia = $existenciaProd -> fetch_assoc()){
                    $existencia+=$vectorExistencia["Exitencia"];
                }    
            }
            if($existencia>$cantidad){

            }else{
                volver("No hay existencia de ese producto");
            }
        }else{
            echo '<h1>'.mysqli_error($conexionBD).'</h1>';
        }
    }
?>

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
    <link rel="stylesheet" href="/appweb/css/styleBC.css">
</head>
<body>
    <?php include "header.php" ?>
    <div class="contenedor">
        <div id="cambios">
           <h2>MODIFICAR PRODUCTOS</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method=POST>
                <label for="id">ID del producto</label><br>
                <input type="number" <?php echo $band==true?'value='.$idAux:'value=0';?> id="id" name="idProdMod" required value="0"><br>
                <p id="text">Ingrse un ID por favor</p>
                <button type="submit"  id="view">Buscar</button>
            </form><br>
            
            <div id="productifo"> 
                <form method=POST action=<?php echo $_SERVER['PHP_SELF']; ?> >
                <?php if($band==true){echo ' 
                <label for="id">ID del producto</label><br>
                <input type="number" value='.$idAux.' readonly id="id" name="idProdSQL" required value="0"><br>
                <label for="nombre">Nombre</label><br>
                <input type="text" id="nombre" value="'. $nombreProd .'" name="nombreMod" required><br>
                <label for="cate">Categoria</label><br>
                <input type="text" id="cate" name="categoria" value="' .$categoriaProd.'" required><br>
                <label for="descript">Descripcion</label><br>
                <textarea  name="descripcion" id="descript" cols="60" rows="5" required>'.$descripcionProd .'</textarea><br>
                <input type="submit" value="Modificar">
            </form>';}?>
            </div>
        </div>
        <div id="bajas">
           <h2>ELIMINAR PRODUCTOS</h2>
            <form method=POST action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="id">ID del producto</label><br>
                <input type="number" id="id" name="idProdDelete"required min="1"><br>
                <input type="submit" onclick="" value="Eliminar">
            </form><br>
            <div id="productifo">
                <!--<p id="NomPro"></p>
                <p></p>-->
            </div>
        </div>
    </div>
    <?php include "footer.php";?>
    <script src="https://kit.fontawesome.com/791abd0481.js" crossorigin="anonymous"></script>
</body>
</html>