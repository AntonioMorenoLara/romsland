<?php
include_once '../../../capaNegocio/Usuario.php';
/** Se incluye la clase Juego. */
include_once '../../../capaNegocio/Juego.php';
session_start();
?>
<!--
    juegos3DS.php
    Modulo que implementa los juegos de nintendo 3DS
-->
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Juegos de Nintendo 3DS</title> <!--título provisional-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Faster+One&family=Edu+NSW+ACT+Foundation&family=Darumadrop+One&display=swap" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="../../imgs/logos/favicon-16x16.png">
        <link rel="stylesheet" href="../../css/estilos.css"> 
    </head>
    <body>
        <div class="contenido mx-auto">
            <?php
            include_once 'plantillaCabecera.php';
            ?>
            <main>
                <section class="tres-columnas">

                    <?php
                    /** @var Instancia la clase Juego. */
                    $juego = new Juego();
                    $juegos = $juego->obtenerJuegosCategoria('3ds');

                    foreach ($juegos as $value) {
                        /** Obtiene el título y la imagen de la portada. */
                        ?>
                        <a href="../<?php
                        if (isset($_SESSION['usuario'])) {
                            echo $value->getModuloJuego();
                        } else {
                            echo 'iniciarSesion.php';
                        }
                        ?>" class="juegosCategoria">
                            <article class="juegoCategoria article-tres-columnas">
                                <img src="../<?= $value->getPortada(); ?>">
                                <p><?= $value->getTitulo(); ?></p>
                            </article>
                        </a>
                        <?php
                    }
                    ?>
                </section>
            </main>
            <?php
            include_once ('plantillaFooter.php');
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>