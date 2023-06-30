<?php
/**
 * Usuario.php
 * Modulo que implementa la clase Usuario.
 */
/** Incluye la clase BDUsuario. */
include_once $_SERVER['DOCUMENT_ROOT'] . '/descargaVideojuegos/capaDatos/php/BDUsuario.php';
/**
 * Crea la clase Usuario
 */
class Usuario {
    
    /**
     * @var string Almacena el email
     * @access private
     */
    private string $email;
    
    /**
     * @var string Almacena la contrasena
     * @access private
     */
    private string $password;
    
    /**
     * @var string Almacena el nombre del usuario
     * @access private
     */
    private string $nombre;
    
    /**
     * Metodo que inicializa el email
     * @access public
     * @param string $email
     * @return void
     */
    public function setEmail(string $email) : void {
        $this->email = $email;
    }

    /**
     * Metodo que inicializa la contrasena
     * @access public
     * @param string $password
     * @return void
     */
    public function setPassword(string $password) : array {
        $errores = array();
        
        if (mb_strlen($password) < 8 || mb_strlen($password) > 20) {
            $errores[] = 'La contraseña tiene que tener entre 8 y 20 caracteres.';
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $errores[] = 'La contraseña tiene que tener por lo menos una mayúscula.';
        }
        if (!preg_match('/[0-9]/', $password)) {
            $errores[] = 'La contraseña tiene que tener por lo menos un número.';
        }
        if (empty($errores)) {
            $this->password = $password;
        }
        return $errores;
    }

    /**
     * Metodo que inicializa el nombre
     * @access public
     * @param string $nombre
     * @return void
     */
    public function setNombre(string $nombre) : void {
        $this->nombre = $nombre;
    }
    
    /**
     * Metodo que inicializa la coleccion de juegos
     * @access public
     * @param array $juegos
     * @return void
     */
    public function setJuegos(array $juegos) : void {
        $this->juegos = $juegos;
    }
    
    /**
     * Metodo que obtiene el email del usuario
     * @access public
     * @return string
     */
    public function getEmail() : string {
        return $this->email;
    }
    
    /**
     * Metodo obtiene la contrasena
     * @access public
     * @return string
     */
    public function getPassword() : string {
        return $this->password;
    }

    /**
     * Metodo que devuelve el nombre
     * @access public
     * @return string
     */
    public function getNombre(): string {
        return $this->nombre;
    }

    /**
     * Metodo que devuelve la coleccion de juegos
     * @access public
     * @return array
     */
    public function getJuegos(): array {
        return $this->juegos;
    }
    
    /**
     * Metodo que comprueba si existe el usuario
     * @access private
     * @return bool
     */
    public function existeUsuario() : bool {
        $bdusuario = new BDUsuario();
        $bdusuario->setEmail($this->email);
        if ($bdusuario->existeUsuario()) {
            return true;
        }
        return false;
    }
    
    /**
     * Metodo que registra un usuario
     * @access public
     * @return bool
     */
    public function registrarUsuario() : bool {
        $bdusuario = new BDUsuario();
        $bdusuario->setEmail($this->email);
        $bdusuario->setPassword($this->password);
        $bdusuario->setNombre($this->nombre);
        if ($bdusuario->registrarUsuario()) {
            return true;
        }
        return false;
    }
    
    /**
     * Metodo que valida un usuario
     * @access public
     * @return bool
     */
    public function validarUsuario() : bool {
        $bdusuario = new BDUsuario();
        $bdusuario->setEmail($this->email);
        $bdusuario->setPassword($this->password);
        if ($bdusuario->validarUsuario()) {
            $this->nombre = $bdusuario->getNombre();
            return true;
        }
        return false;
    }
    
    /**
     * Metodo que devuelve el numero de juegos que tiene el usuario
     */
    public function numJuegos() : int {
        $bdjuegosusuario = new BDJuegosUsuario();
        $bdjuegosusuario->setEmail($this->email);
        return $bdjuegosusuario->numJuegos();
    }
    
    
}
