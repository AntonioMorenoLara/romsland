<?php
/** Se incluye la clase Usuario. */
include_once '../../capaNegocio/Usuario.php';

/** Inicia una sesión nueva o la recupera. */
session_start();

/** Comprueba si se ha marcado el checkbox de recordar. */
if (isset($_POST['recordar'])) {
    setcookie('email', $_POST['email'], time() + (60 * 60 * 3));
} else {
    /** En caso contrario, se borra. */
    setcookie('email', '', time() - 3600);
}
?>
<!-- 
    validarUsuario.php
    Módulo que valida a un Usuario
-->
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Validar Usuario</title> <!--título provisional-->
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
                        <p>Usuario: <?= $_SESSION['usuario']->getNombre(); ?></p>
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
                    <button class="navbar-toggler" type="button" 
                            data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                            aria-controls="navbarNav" aria-expanded="false" 
                            aria-label="Toggle navigation">
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
                                    <a class="nav-link" href="../contacto.php">Contacto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../emuladores.php">Emuladores</a>
                                </li>
                                <?php
                            }
                            ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main>
                <?php
                if (isset($_POST['validar'])) {
                    /** Comprueba si están todos los campos tienen texto. */
                    if (!empty($_POST['email']) && !empty($_POST['pass'])) {
                        /** @var Usuario Instancia la clase Usuario. */
                        $usuario = new Usuario();
                        /** Inicializa los atributos. */
                        $usuario->setEmail($_POST['email']);
                        $pass = $usuario->setPassword($_POST['pass']);
                        // Comprueba si la contraseña tiene errores
                        if ($pass) {
                            ?>
                            <section class="una-columna">
                                <img src='../imgs/logos/passInvalid.jpg' 
                                     class='images-logos-anchura fail'>
                            </section>
                            <?php
                            foreach ($pass as $error) {
                                ?>
                                <section class="una-columna">
                                    <p class='error'>
                                        <?= $error ?>
                                    </p>
                                </section>

                                <?php
                            }
                            ?>
                            <section class="una-columna">
                                <a href = "iniciarSesion.php">
                                    <button class = "iniciar">Volver</button>
                                </a>
                            </section>
                            <?php
                        } else {
                            if ($usuario->validarUsuario()) {
                                $_SESSION['usuario'] = $usuario;
                                ?>
                                <section class="una-columna">
                                    <p class='exito aumentar'>
                                        Bienvenido a tu Tierra de Juegos
                                    </p>
                                    <a href="index.php">
                                        <button class="iniciar">Ir a inicio</button>
                                    </a>
                                </section>
                                <?php
                            } else {
                                ?>
                                <section class="una-columna">
                                    <img src='../imgs/logos/logoSoldado.webp' 
                                         class='images-logos-anchura rotarY'>
                                    <p class='error'>
                                        ¿Seguro que eres un miembro de SOLDADO? 
                                        Si es así, escribe tu email y contraseña de nuevo.
                                    </p>
                                    <a href="iniciarSesion.php">
                                        <button class="iniciar">Volver</button>
                                    </a>
                                </section>
                                <?php
                            }
                        }
                    } else {
                        /** Campo vacío. */
                        ?>
                        <section class="una-columna">
                            <img src='../imgs/logos/hyrule.jpg' 
                                 class='images-logos-anchura aumentar'>
                            <p class='error'>
                                Te falta algún campo por registrar y no es el 
                                de Hyrule.
                            </p>
                            <a href="iniciarSesion.php">
                                <button class="iniciar">Volver</button>
                            </a>
                        </section>
                        <?php
                    }
                } else {
                    /** No se puede acceder a esta pagina. */
                    ?>
                    <section class="una-columna">
                        <img src='../imgs/logos/noPasar.jpg' 
                             class='images-logos-anchura aumentar'>
                        <p class='error'>
                            No pasarás a está página sin autorización
                        </p>
                        <a href="iniciarSesion.php">
                            <button class="iniciar">Volver</button>
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