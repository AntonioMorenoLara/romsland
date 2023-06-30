<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $juego->getTitulo(); ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Faster+One&family=Edu+NSW+ACT+Foundation&family=Darumadrop+One&display=swap" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="../../../imgs/logos/favicon-16x16.png">
        <link rel="stylesheet" href="../../../css/estilos.css">
    </head>
    <body>
        <div class="contenido mx-auto">
            <?php
            include_once 'plantillaCabecera.php';
            ?>
            <main class="ajuste-contenido">
                <?php
                if (isset($_SESSION['usuario'])) {
                    foreach ($descargaJuego as $value) {
                        ?>
                        <section class="tres-columnas">
                            <img src="../../<?= $value->getPortada() ?>" class="img-juego">
                            <h2 class="titulo-juego"><?= $value->getTitulo() ?></h2>
                            <p class="cat-juego">Categoría: <?= $value->getCategoria() ?></p>
                            <p class="descripcion-juego formato-parrafo">
                                <?= $value->getDescripcion() ?>
                            </p>
                        </section>
                        <a href="<?=$value->getRutaNube()?>">
                            <section class="p-5">
                                <button id="mensaje" class="descargar mx-auto">
                                    <img src="../../../imgs/logos/descarga.png">
                                    Descargar
                                </button>
                            </section>
                        </a>
                        <section class="dos-columnas">
                            <?php
                            foreach ($value->getImagenes() as $image) {
                                ?>

                                <a href="../../<?= $image ?>" target="_blank">
                                    <img class="images-logos-anchura rounded-0" 
                                         src="../../<?= $image ?>">
                                </a>

                                <?php
                            }
                            ?>
                        </section>
                        <?php
                    }
                } else {
                    ?>
                    <section class="una-columna">
                        <img src='../../../imgs/logos/noPasar.jpg' 
                             class='images-logos-anchura aumentar'>
                        <p class='error'>
                            No pasarás a está página sin autorización
                        </p>
                        <a href="../../index.php">
                            <button class="iniciar">Volver a inicio</button>
                        </a>
                    </section>
                    <?php
                }
                ?>
            </main>
            <?php
            include_once ('../plantillaFooter.php');
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>