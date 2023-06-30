<?php
/** Incluye las clases necesarias. */
include_once '../../../../capaNegocio/Juego.php';
include_once '../../../../capaNegocio/Usuario.php';
/** @var Juego Instancia la clase Juego. */
/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
$juego = new Juego();
/** Obtiene el juego por titulo. */
$descargaJuego = $juego->obtenerJuegoTitulo('Silent Hill Origins');
?>
<!--
    * silenthill.php
    * Modulo que implementa la pagina de descarga de Silent Hill Origins
-->
<?php
    /** Incluye el cuerpo de la pagina a partir del modulo plantillaJuego.php. */
    include_once '../plantillaJuego.php';
?>