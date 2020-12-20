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

        </ul>
        <p id="mensajeBienvenida"><?php if(isset($_SESSION["userNombre"])&&!empty($_SESSION["userNombre"])){echo "Hola ".$_SESSION["userNombre"];} ?></p>
        <?php
        if (isset($_SESSION["userNombre"])&&!empty($_SESSION["userNombre"])){
            echo '<a href="/appweb/mod/carrito.php" id="carritoBtn"><img src="/appweb/images/carticon.svg"></a>';
        }
        ?>

        <?php if(isset($_SESSION["userNombre"])&&!empty($_SESSION["userNombre"])){echo "<a href='/appweb/mod/logout.php'>Cerrar sesión</a>";} ?>
        <?php if(!isset($_SESSION["userNombre"])||empty($_SESSION["userNombre"])){ echo '<a href="/appweb/mod/loginView.php"><button class="btn btn-primary" type="button" id="botonLogin">Login</button></a>';} ?>
    </div>
</nav>
