<?php

/**
 * Juego.php
 * Modulo que implementa la clase Juego
 */
/** Se incluye la clases necesarias de la capa de Datos. */
include_once $_SERVER['DOCUMENT_ROOT'] . '/descargaVideojuegos/capaDatos/php/BDJuego.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/descargaVideojuegos/capaDatos/php/BDImagenesJuego.php';

/**
 * Creacion de la clase
 */
class Juego {

    /**
     * @var string Almacena el titulo del juego
     * @access private
     */
    private string $titulo;

    /**
     * @var string Almacena la imagen de la portada del juego
     * @access private
     */
    private string $portada;

    /**
     * @var string Almacena la descripcion del juego
     * @access private
     */
    private string $descripcion;

    /**
     * @var string Almacena la categoria del juego
     * @access private
     */
    private string $categoria;

    /**
     * @var string Almacena la ruta del juego donde está situada en la nube
     * @access private
     */
    private string $rutaNube;

    /**
     * @var string Almacena la ruta del modulo del juego 
     * @access private
     */
    private string $moduloJuego;

    /**
     * @var string[] Almacena las imagenes del juego
     * @access private
     */
    private array $imagenes;

    /**
     * Metodo que obtiene el titulo
     * @access public
     * @return string
     */
    public function getTitulo(): string {
        /** Devuelve el título. */
        return $this->titulo;
    }

    /**
     * Metodo que obtiene la imagen de la portada
     * @access public
     * @return string
     */
    public function getPortada(): string {
        return $this->portada;
    }

    /**
     * Metodo que obtiene la descripcion de la portada
     * @access public
     * @return string
     */
    public function getDescripcion(): string {
        return $this->descripcion;
    }

    /**
     * Metodo que obtiene la categoria
     * @access public
     * @return string
     */
    public function getCategoria() : string {
        return $this->categoria;
    }

    /**
     * Metodo que obtiene la ruta de la nube
     * @access public
     * @return string
     */
    public function getRutaNube(): string {
        return $this->rutaNube;
    }

    /**
     * Metodo que obtiene la ruta del modulo del juego
     * @access public
     * @return string
     */
    public function getModuloJuego(): string {
        return $this->moduloJuego;
    }

    /**
     * Metodo que obtiene las imagenes
     * @access public
     * @return array
     */
    public function getImagenes(): array {
        return $this->imagenes;
    }

    /**
     * Metodo que obtiene los juegos de una determinada categoria
     * @access public
     * @param string $categoria
     * @return array[]:Juego
     */
    public function obtenerJuegosCategoria(string $categoria): array {
        $juegosCategoria = array();
        $bdjuego = new BDJuego();
        foreach ($bdjuego->obtenerJuegosCategoria($categoria) as $value) {
            $this->titulo = $value['titulo'];
            $this->portada = $value['portada'];
            $this->moduloJuego = $value['moduloJuego'];
            $juegosCategoria[] = clone $this;
        }
        return $juegosCategoria;
    }

    /**
     * Metodo que obtiene un juego a partir del titulo.
     * @access public
     * @param string $titulo
     * @return array
     */
    public function obtenerJuegoTitulo(string $titulo): array {
        $juegoTitulo = array();
        $bdjuego = new BDJuego();
        $juegosImgs = new BDImagenesJuego();
        foreach ($bdjuego->obtenerJuegoTitulo($titulo) as $value) {
            $this->titulo = $value['titulo'];
            $this->portada = $value['portada'];
            $this->moduloJuego = $value['moduloJuego'];
            $this->descripcion = $value['descripcion'];
            $this->categoria = $value['categoria'];
            $this->rutaNube = $value['rutaNube'];
            foreach ($juegosImgs->getImagenesByTitulo($titulo) as $value) {
                $this->imagenes[] = $value['imagen'];
            }
            $juegoTitulo[] = clone $this;
        }
        return $juegoTitulo;
    }
    
    public function rutaJuegoByAjax() {
        $response = array("rutaJuego" => $this->rutaNube);
        $result = json_encode($response);
        return $result;
    }

}


