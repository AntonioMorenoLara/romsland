<?php
/**
 * BDImagenesJuego.php
 * Modulo que implementa la clase BDImagenesJuego
 */
/** Incluye la clase Driver */
include_once 'Driver.php';
/**
 * Crea la clase BDImagenesJuego
 */
class BDImagenesJuego extends Driver {
    
    /**
     * @var string Almacena el titulo del juego.
     * @access private
     */
    private string $titulo;
    
    /**
     * @var string Almacena la ruta de la imagen del juego.
     * @access public
     */
    private string $imagen;
    
    /**
     * Metodo que obtiene el titulo
     * @access public
     * @return string
     */
    public function getTitulo() : string {
        return $this->titulo;
    }

    /**
     * Metodo que obtiene la ruta de la imagen
     * @access public
     * @return string
     */
    public function getImagen() : string {
        return $this->imagen;
    }

    /**
     * Metodo que obtiene las imagenes por titulo
     * @access public
     * @param string $titulo Titulo del juego pasado por parametro
     * @return array[]
     */
    public function getImagenesByTitulo(string $titulo) : array {
        /** @var array[]:string Array donde se van a guardar los datos del
         * juego. */
        $juegos = array();
        if ($this->getCon()) {
            $query = $this->getCon()->prepare(
                    "SELECT imagen
                     FROM imagenesjuego
                     WHERE titulo = :titulo"
            );
            $query->bindParam(':titulo', $titulo);
            if ($query->execute()) {
                /** Comprueba si retorna alguna fila. */
                if ($query->rowCount() >= 1) {
                    $juegos = $query->fetchAll();
                }
            }
        }
        return $juegos;
    }
}
