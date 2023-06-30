<?php
include_once '../../capaNegocio/Usuario.php';
/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
?>
<!--
    * emuladores.php
    * Modulo donde se pueden descargar los emuladores
-->
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Emuladores</title> <!--título provisional-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Faster+One&family=Edu+NSW+ACT+Foundation&family=Darumadrop+One&display=swap" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="../imgs/logos/favicon-16x16.png">
        <link rel="stylesheet" href="../css/estilos.css"> 
    </head>
    <body>
        <div class="contenido mx-auto">
            <?php
            if (isset($_SESSION['usuario'])) {
                ?>
                <div class="sesion">
                    <div class="d-flex align-items-end flex-column me-3">
                                <p>Usuario: <?= $_SESSION['usuario']->getNombre() ?></p>
                            </div>
                    <a href="cerrarSesion.php"><button class="iniciar">Cerrar Sesión</button></a>
                    
                </div>
                <?php
            }
            ?>
            <header class="logo-centrado">
                <a href="index.php"><img src="../imgs/logos/logo.png" alt="logo pagina"></a>
            </header>
            <nav class="navbar navbar-expand-md menu margin-bottom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="categorias.php">Categorías</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sobreNosotros.php">Sobre Nosotros</a>
                            </li>
                            <?php
                            if (isset($_SESSION['usuario'])) {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="contacto.php">Contacto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="emuladores.php">Emuladores</a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="ajuste-contenido">
                <?php
                if (isset($_SESSION['usuario'])) {
                    ?>
                    <h2 class="margen-h2">Emuladores</h2>
                    <section class="tres-columnas">
                        <article>
                            <a href="https://mega.nz/file/xRVH2BbD#4cV4bcRJKKO9iC3LM5c_94aQmMq84X6Xzp6aS4E7MRw" target="_blank" class="article-tres-columnas links-logos">
                                <h3>Nintendo DS</h3>
                                <img src="../imgs/emuladores/emuNDS.png" alt="emulador nintendo ds" class="images-logos-altura">
                                <p>Desmume</p>
                            </a>

                        </article>
                        <article>
                            <a href="https://mega.nz/file/VcMXWQyb#QgFwkTTe6ApsZqFqxrJgjjqARxLwMAL_2n8YomPCHjs" target="_blank" class="article-tres-columnas links-logos">
                                <h3>Nintendo 3DS</h3>
                                <img src="../imgs/emuladores/emu3DS.png" alt="emulador nintendo 3ds" class="images-logos-altura">
                                <p>Citra</p>
                            </a>
                        </article>
                        <article>
                            <a href="https://mega.nz/file/8A9DxZaa#VShand3aZCrH_PH3YGNsOT6gjAnpdRsTNdocrHzt_4k" target="_blank" class="article-tres-columnas links-logos">
                                <h3>PSP</h3>
                                <img src="../imgs/emuladores/emuPSP.png" alt="emulador psp" class="images-logos-altura">
                                <p>PPSSPP</p>
                            </a>
                        </article>
                    </section>

                    <?php
                }
                else {
                    ?>
                    <section class="una-columna">
                        <img src='../imgs/logos/noPasar.jpg' 
                             class='images-logos-anchura aumentar'>
                        <p class='error'>
                            No pasarás a está página sin autorización
                        </p>
                        <a href="index.php">
                            <button class="iniciar">Volver a Inicio</button>
                        </a>
                    </section>
                    <?php
                }
                ?>
            </main>
            <?php
            include_once ('plantillaFooter.php');
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>