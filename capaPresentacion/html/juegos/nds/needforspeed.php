<?php
/** Incluye lasclases necesarias. */
include_once '../../../../capaNegocio/Juego.php';
include_once '../../../../capaNegocio/Usuario.php';
/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
/** @var Juego Instancia la clase Juego. */
$juego = new Juego();
/** Obtiene el juego por titulo. */
$descargaJuego = $juego->obtenerJuegoTitulo('Need for Speed Carbon Own the City');
?>
<!--
    * needforspeed.php
    * Modulo que implementa la pagina de descarga de Need for Speed
-->
<?php
    /** Incluye el cuerpo de la pagina a partir del modulo plantillaJuego.php. */
    include_once '../plantillaJuego.php';
?>