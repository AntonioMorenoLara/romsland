<?php
/** Incluye la clase Juego. */
include_once '../../capaNegocio/Juego.php';
include_once '../../capaNegocio/Usuario.php';
/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
?>
<!-- 
    index.php
    Módulo principal de descargaVideojuegos
-->
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RomsLand</title> <!--título provisional-->
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
            if (!isset($_SESSION['usuario'])) {
                ?>
                <div class="sesion ajuste-contenido">
                    <a href="registrar.php"><button class="registrar">Registrarse</button></a>
                    <a href="iniciarSesion.php"><button class="iniciar">Iniciar sesión</button></a>
                </div>
                <?php
            } else {
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

            <header class="cabecera-index">
                <img src="../imgs/logos/logo.png" alt="logo" class="imagen-index">
                <h1 class="">ROMSLAND</h1>
            </header>
            <nav class="navbar navbar-expand-md menu margin-bottom ajuste-contenido">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
                                    <a class="nav-link" href="emuladores.php">Emuladores</a>
                                </li>
                                <?php
                            }
                            ?>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="main">
                <section>
                    <article> <!-- Juegos de NDS -->
                        <div class="container">
                            <div class="row">
                                <h2>Juegos de Nintendo DS</h2>
                                <div id="juegosNDS" class="carousel mx-auto slide margin-bottom">
                                    <div class="carousel-inner p-5">
                                        <?php
                                        /** @var Juego Instancia la clase Juego. */
                                        $juego = new Juego();
                                        foreach ($juego->obtenerJuegosCategoria('nds') as $key => $value) {
                                            ?>
                                            <div class="carousel-item <?php
                                            if ($key === 0) {
                                                echo 'active';
                                            }
                                            ?>">
                                                <a href="<?php
                                                if (isset($_SESSION['usuario'])) {
                                                    echo $value->getModuloJuego();
                                                } else {
                                                    echo 'iniciarSesion.php';
                                                }
                                                ?>">
                                                    <img src="<?= $value->getPortada(); ?>" class="d-block mx-auto size-images" alt=""/>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#juegosNDS" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#juegosNDS" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article> <!-- Juegos de 3DS -->
                        <div class="container">
                            <div class="row">
                                <h2>Juegos de Nintendo 3DS</h2>
                                <div id="juegos3DS" class="carousel slide mx-auto margin-bottom">
                                    <div class="carousel-inner p-5">
                                        <?php
                                        foreach ($juego->obtenerJuegosCategoria('3ds') as $key => $value) {
                                            ?>
                                            <div class="carousel-item <?php
                                            if ($key === 0) {
                                                echo 'active';
                                            }
                                            ?>">
                                                <a href="<?php
                                                if (isset($_SESSION['usuario'])) {
                                                    echo $value->getModuloJuego();
                                                } else {
                                                    echo 'iniciarSesion.php';
                                                }
                                                ?>">
                                                    <img src="<?= $value->getPortada(); ?>" class="d-block mx-auto size-images" alt=""/>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#juegos3DS" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#juegos3DS" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article> <!-- Juegos de PSP -->
                        <div class="container">
                            <div class="row">
                                <h2 class="">Juegos de PSP</h2>
                                <div id="juegosPSP" class="carousel slide mx-auto margin-bottom">
                                    <div class="carousel-inner p-5">
                                        <?php
                                        foreach ($juego->obtenerJuegosCategoria('psp') as $key => $value) {
                                            //var_dump($value->getModuloJuego());
                                            ?>
                                            <div class="carousel-item <?php
                                            if ($key === 0) {
                                                echo 'active';
                                            }
                                            ?>">
                                                <a href="<?php
                                                if (isset($_SESSION['usuario'])) {
                                                    echo $value->getModuloJuego();
                                                } else {
                                                    echo 'iniciarSesion.php';
                                                }
                                                ?>">
                                                    <img src="<?= $value->getPortada(); ?>" class="d-block mx-auto size-images-psp" alt=""/>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#juegosPSP" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#juegosPSP" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>  
            </main>
            <?php
            include_once ('plantillaFooter.php');
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>