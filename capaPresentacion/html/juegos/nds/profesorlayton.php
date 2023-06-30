<?php
/** Incluye las clases necesarias. */
include_once '../../../../capaNegocio/Juego.php';
include_once '../../../../capaNegocio/Usuario.php';
/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
/** @var Juego Instancia la clase Juego. */
$juego = new Juego();
/** Obtiene los juegos por titulo. */
$descargaJuego = $juego->obtenerJuegoTitulo('Profesor Layton y la Caja de Pandora');
?>
<?php
    /** Incluye el cuerpo de la pagina a partir del modulo plantillaJuego.php. */
    include_once '../plantillaJuego.php';
?>