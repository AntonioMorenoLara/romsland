<?php
/** Incluye las clases necesarias. */
include_once '../../../../capaNegocio/Juego.php';
include_once '../../../../capaNegocio/Usuario.php';
/** Inicia una nueva sesión o recupera la sesión actual. */
session_start();
/** @var Juego Instancia la clase Juego. */
$juego = new Juego();
/** Obtiene el juego por titulo. */
$descargaJuego = $juego->obtenerJuegoTitulo('Kingdom Hearts Birth By Sleep');
?>
<!--
    * kingdomhearts.php
    * Modulo que implementa la pagina de descarga de Kingdom Hearts Birth By Sleep
-->
<?php
    /** Incluye el cuerpo de la pagina a partir del modulo plantillaJuego.php. */
    include_once '../plantillaJuego.php';
?>