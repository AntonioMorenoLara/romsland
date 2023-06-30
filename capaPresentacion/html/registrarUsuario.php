<?php
/** Se incluye la clase Usuario. */
include_once '../../capaNegocio/Usuario.php';
?>
<!-- 
    registrarUsuario.php
    Módulo que registra a un usuario.
-->
<!DOCTYPE html>
<html lang="es-ES">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrar Usuario</title>
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
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main>
                <?php
                if (isset($_POST['registrar'])) {
                    if (!empty($_POST['email']) && !empty($_POST['pass']) &&
                            !empty($_POST['name'])) {
                        /** @var Usuario Instancia la clase Usuario. */
                        $usuario = new Usuario();
                        /** Inicializa los atributos. */
                        $usuario->setEmail($_POST['email']);
                        $usuario->setNombre($_POST['name']);
                        $erroresPass = $usuario->setPassword($_POST['pass']);
                        if ($erroresPass) {
                            ?>
                            <section class="una-columna">
                                <img src='../imgs/logos/passInvalid.jpg' 
                                     class='images-logos-anchura fail'>
                            </section>
                            <?php
                            foreach ($erroresPass as $error) {
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
                                <a href = "registrar.php">
                                    <button class = "iniciar">Volver</button>
                                </a>
                            </section>
                            <?php
                        } else {
                            /** Comprueba si existe el usuario. */
                            if ($usuario->existeUsuario()) {
                                /** El usuario ya existe. */
                                ?>
                                <section class="una-columna">
                                    <article class="fondo-blanco rounded-5">
                                        <img src='../imgs/logos/flechasRepetidas.png' 
                                             class='images-logos-anchura rotar'>
                                    </article>

                                    <p class='error'>
                                        Ya hay un camarada con este email ya en 
                                        nuestras tropas. Debes utilizar otro email 
                                        para poder pasar.
                                    </p>
                                    <a href="registrar.php">
                                        <button class="iniciar">Volver</button>
                                    </a>
                                </section>
                                <?php
                            } else {
                                /** Comprueba de que se pueda registrar al usuario. */
                                if ($usuario->registrarUsuario()) {
                                    /** El usuario se ha registrado correctamente. */
                                    ?>
                                    <section class="una-columna">
                                        <img src='../imgs/logos/luffy.webp' 
                                             class='images-logos-anchura rotarY'>
                                        <p class='exito'>
                                            Bienvenido a nuestra tripulación, nakama
                                        </p>
                                        <div>
                                            <p>¿Quieres iniciar sesión?</p>
                                            <div class="dos-columnas">
                                                <form action="validarUsuario.php" class="h-auto" method="POST">
                                                    <input type="hidden" name="email" value="<?= $usuario->getEmail(); ?>">
                                                    <input type="hidden" name="pass" value="<?= $usuario->getPassword(); ?>">
                                                    <input type="submit" value="Sí" name="validar" class="confirmar">
                                                </form>
                                                <form action="index.php" class="h-auto" method="POST">
                                                    <input type="submit" value="No" class="confirmar">
                                                </form>
                                            </div>

                                        </div>
                                    </section>
                                    <?php
                                } else {
                                    /** Se ha producido un error al registrar. */
                                    echo '<p style="color:red";>error registrar.</p>';
                                }
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
                                de Hyrule
                            </p>
                            <a href="registrar.php">
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
                        <a href="registrar.php">
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