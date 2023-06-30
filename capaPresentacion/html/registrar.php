<?php
/** Inicia una sesión nueva o la recupera. */
session_start();
?>
<!--
    * registrar.php
    * Modulo que tiene un formulario para el registro de un usuario
-->
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrarse</title>
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
            <main class="centra-form">
                <?php
                if (!isset($_SESSION['usuario'])) {
                    ?>
                    <section class="border-form">
                        <h2 class="mt-5">Registrarse</h2>
                        <form action="registrarUsuario.php" method="POST">
                            <input type="email" placeholder="email" name="email">
                            <input type="password" placeholder="contraseña" name="pass">
                            <input type="text" placeholder="nombre de usuario" name="name">
                            <input type="submit" value="Registrar" name="registrar" class="validar">
                        </form>
                        <p>¿Ya tienes cuenta? Inicia sesión 
                            <a href="iniciarSesion.php" class="hover-raton">Aquí.</a>
                        </p>
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
                                <button class="iniciar">Volver a inicio</button>
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