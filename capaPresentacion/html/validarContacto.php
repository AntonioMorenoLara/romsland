<?php
/** Se incluye la clase Usuario. */
include_once '../../capaNegocio/Mail.php';
session_start();
?>
<!-- 
    validarContacto.php
    Módulo que manda un email
-->
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Validar Contacto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Faster+One&family=Edu+NSW+ACT+Foundation&family=Darumadrop+One&display=swap" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="../imgs/logos/favicon-16x16.png">
        <link rel="stylesheet" href="../css/estilos.css"> 
    </head>
    <body>

        <div class="contenido mx-auto">
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
                                    <a class="nav-link" href="emuladores.php">Emuladores</a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <main>
                <?php
                if (isset($_SESSION['usuario'])) {
                    if (!empty($_POST['asunto']) && !empty($_POST['mensaje'])) {
                        $email = new Mail();
                        $email->setEmail($_POST['email']);
                        $email->setAsunto($_POST['asunto']);
                        $email->setMensaje($_POST['mensaje']);

                        if ($email->mandarEmail()) {
                            ?>
                            <section class="una-columna">
                                <img src='../imgs/logos/emailEnviado.jpg' 
                                     class='images-logos-anchura rotarY'>
                                <p class='exito'>
                                    Se ha enviado tu email con éxito
                                </p>
                                <a href="index.php">
                                    <button class="iniciar">Volver a inicio</button>
                                </a>
                            </section>

                            <?php
                        } else {
                            ?>
                            <section class="una-columna">
                                <img src='../imgs/logos/errorEmail.jpg' 
                                     class='images-logos-anchura fail'>
                                <p class='error'>
                                    Se ha producido un error al enviar tu email
                                </p>
                                <a href="contacto.php">
                                    <button class="iniciar">Volver</button>
                                </a>
                            </section>
                            <?php
                        }
                    } else {
                        ?>
                        <section class="una-columna">
                            <img src='../imgs/logos/hyrule.jpg' 
                                 class='images-logos-anchura aumentar'>
                            <p class='error'>
                                Te falta algún campo por registrar y no es el 
                                de Hyrule
                            </p>
                            <a href="contacto.php">
                                <button class="iniciar">Volver</button>
                            </a>
                        </section>
                        <?php
                    }
                } else {
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