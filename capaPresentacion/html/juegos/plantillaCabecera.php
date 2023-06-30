<?php
if (isset($_SESSION['usuario'])) {
    ?>
    <div class="sesion">
        <div class="d-flex align-items-end flex-column me-3">
            <p>Usuario: <?= $_SESSION['usuario']->getNombre() ?></p>
        </div>
        <a href="../../cerrarSesion.php"><button class="iniciar">Cerrar Sesión</button></a>

    </div>
    <?php
}
?>
<header class="logo-centrado">
    <a href="../../index.php"><img src="../../../imgs/logos/logo.png" alt="logo pagina"></a>
</header>
<nav class="navbar navbar-expand-md menu margin-bottom">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../categorias.php">Categorías</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../sobreNosotros.php">Sobre Nosotros</a>
                </li>
                <?php
                if (isset($_SESSION['usuario'])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../emuladores.php">Emuladores</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>