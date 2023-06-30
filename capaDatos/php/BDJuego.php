<?php

/**
 * BDJuego.php
 * Modulo que implementa la clase BDJuego
 */
/** incluye la clase DriverBD */
include_once 'Driver.php';

/**
 * Se crea la clase BDJuego 
 */
class BDJuego extends Driver {

    /**
     * @var string Almacena el titulo del juego.
     * @access private
     */
    private string $titulo;

    /**
     * @var string Almacena la ruta de la portada del juego.
     * @access private
     */
    private string $portada;

    /**
     * @var string Almacena la descripcion del juego.
     * @access private
     */
    private string $descripcion;

    /**
     * @var string Almacena la categoria del juego.
     * @access private
     */
    private string $categoria;

    /**
     * @var string Almacena la ruta del juego en la nube.
     * @access private
     */
    private string $rutaNube;

    /**
     * @var string Almacena la ruta del modulo del juego
     */
    private string $moduloJuego;

    /**
     * Metodo que devuelve el titulo
     * @access public
     * @return string
     */
    public function getTitulo(): string {
        return $this->titulo;
    }

    /**
     * Metodo que devuelve la portada
     * @access public
     * @return string
     */
    public function getPortada(): string {
        return $this->portada;
    }

    /**
     * Metodo que devuelve la descripcion
     * @access public
     * @return string
     */
    public function getDescripcion(): string {
        return $this->descripcion;
    }

    /**
     * Metodo que devuelve la categoria
     * @access public
     * @return string
     */
    public function getCategoria(): string {
        return $this->categoria;
    }

    /**
     * Metodo que devuelve la ruta de la nube
     * @access public
     * @return string
     */
    public function getRutaNube(): string {
        return $this->rutaNube;
    }

    /**
     * Metodo que devuelve la ruta del modulo del juego.
     * @access public
     * @return string
     */
    public function getModuloJuego(): string {
        return $this->moduloJuego;
    }

    /**
     * Modulo que obtiene los juegos a partir de una categoria
     * @access public
     * @param string $categoria
     * @return array
     */
    public function obtenerJuegosCategoria(string $categoria) : array {
        /** @var array[]:string Array donde se van a guardar los datos de los 
         * juegos. */
        $juegos = array();
        if ($this->getCon()) {
            $query = $this->getCon()->prepare(
                    "SELECT titulo, portada, moduloJuego
                     FROM Juego
                     WHERE categoria = :categoria"
            );
            $query->bindParam(':categoria', $categoria);
            if ($query->execute()) {
                if ($query->rowCount() >= 1) {
                    $juegos = $query->fetchAll();
                }
            }
        }
        return $juegos;
    }

    /**
     * Modulo que obtiene un juego por titulo
     * @access public
     * @param string $titulo
     * @return array
     */
    public function obtenerJuegoTitulo(string $titulo): array {
        /** @var array[]:string Array donde se van a guardar los datos del 
         * juego. */
        $juegos = array();
        if ($this->getCon()) {
            $query = $this->getCon()->prepare(
                    "SELECT titulo, portada, moduloJuego, descripcion, categoria,
                        rutaNube
                     FROM Juego
                     WHERE titulo = :titulo"
            );
            $query->bindParam(':titulo', $titulo);
            if ($query->execute()) {
                if ($query->rowCount() >= 1) {
                    $juegos = $query->fetchAll();
                }
            }
        }
        /** Retorna el array con los juegos. */
        return $juegos;
    }

}
