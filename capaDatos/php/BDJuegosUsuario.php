<?php

/**
 * BDJuegosUsuaio
 * Implementacion de la clase BDJuegosUsuario
 */
/** Incluye la clase Driver */
include_once 'Driver.php';
/**
 * Crea la clase BDJuegosUsuario
 */
class BDJuegosUsuario extends Driver {

    /**
     * @private string Almacena el email del usuario
     */
    private string $email;

    /**
     * @private string Almacena el titulo del juego
     */
    private string $titulo;

    /**
     * Metodo que obtiene el email
     * @access public
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Metodo que obtiene el titulo
     * @return string
     */
    public function getTitulo(): string {
        return $this->titulo;
    }

    public function numJuegos(): int {

        $numJuegos = 0;
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getCon()) {
            $resultado = $this->getCon()->prepare(
                "SELECT titulo
				 FROM JuegosUsuario
			     WHERE email = :email");
            $resultado->bindParam(':email', $this->email);
            if ($resultado->execute()) {
                if ($resultado->rowCount() >= 1) {
                    $numJuegos = $resultado->rowCount();
                }
            }
        }
        return $numJuegos;
        
    }

}
