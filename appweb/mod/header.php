<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="/index.php" class="navbar-brand">
        <img class="imgNav d-block" width="140" src="/appweb/images/logoNav.png">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link h5" href="/index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h5" href="/appweb/mod/mainShop.php">Tienda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h5" href="/appweb/mod/contactanos.php">Contactanos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h5" href="/appweb/mod/acercaDe.php">Acerca De</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h5" href="/appweb/mod/FQA.php">Ayuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link h5" href="/appweb/mod/cuponera.php">Cupones</a>
            </li>

        </ul>

        <div id="carritoBtn">
            <?php
                //$totalProductos
                if (isset($_SESSION["userNombre"])&&!empty($_SESSION["userNombre"])){
                    if ($resSetCarr=$conexionBD->query("SELECT SUM(cantidad) FROM carrito WHERE idUsuar=".$_SESSION["userID"]." GROUP BY idUsuar;")){
                        if ($arregloCarrRS=$resSetCarr->fetch_assoc()){
                            $totalProductos=$arregloCarrRS["SUM(cantidad)"];
                        }else{
                            $totalProductos=0;
                        }
                    }
                }
            ?>
            <?php if(isset($_SESSION["admin"])&&!empty($_SESSION["admin"])){echo "<a href='/appweb/mod/menuAdmin.php' id='botonAdmin'>Admin</a>";} ?>
            <?php if(isset($_SESSION["userNombre"])&&!empty($_SESSION["userNombre"])){echo '<div id="userNav"><i class="far fa-user-circle fa-3x"></i> <p styles="color:white;" id="mensajeBienvenida">'. $_SESSION["userNombre"].'</p> </div> ';} ?>
            <?php if(isset($_SESSION["userNombre"])&&!empty($_SESSION["userNombre"])){echo '<a href="/appweb/mod/compras.php" > <div id="cantidadCarrito"> <h2 id="numeroCarrito">'.$totalProductos.'</h2> <img src="/appweb/images/carticon.svg"></div></a>';}else{echo '<a href="/appweb/mod/loginView.php" ><img src="/appweb/images/carticon.svg"></a>';} ?>
            <?php if(isset($_SESSION["userNombre"])&&!empty($_SESSION["userNombre"])){echo "<a class='btn btn-link' href='/appweb/mod/logout.php'>Cerrar sesión</a>";} ?>
            <?php if(!isset($_SESSION["userNombre"])||empty($_SESSION["userNombre"])){ echo '<a href="/appweb/mod/loginView.php"><button class="btn btn-primary" type="button" id="botonLogin">Login</button></a>';} ?>
        </div>

    </div>
</nav>
