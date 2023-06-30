<?php

/**
 * BDUsuario.php
 * Modulo que implementa la clase BDUsuario
 */
/** Incluye la clase Driver. */
include_once 'Driver.php';

/**
 * Se crea la clase BDUsusario
 */
class BDUsuario extends Driver {

    /**
     * @var string Almacena el email del usuario
     * @access private
     */
    private string $email;

    /**
     * @var string Almacena la contrasena del usuario
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
    public function setEmail(string $email): void {
        /** Inicializa el email. */
        $this->email = $email;
    }

    /**
     * Metodo que inicializa la contrasena
     * @access public 
     * @param string $password
     * @return void
     */
    public function setPassword(string $password): void {
        /** Inicializa la contrasena. */
        $this->password = $password;
    }

    /**
     * Metodo que inicialia el nombre
     * @access public
     * @param string $nombre
     * @return void
     */
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    /**
     * Metodo que obtiene el email
     * @access public
     * @return string
     */
    public function getEmail(): string {
        /** Devuelve el email. */
        return $this->email;
    }

    /**
     * Metodo que obtiene la contrasena
     * @access public
     * @return string
     */
    public function getPassword(): string {
        /** Devuelve la contrasena. */
        return $this->password;
    }

    /**
     * Metodo que obtiene el nombre
     * @access public
     * @return string
     */
    public function getNombre(): string {
        return $this->nombre;
    }

    /**
     * Metodo que comprueba si existe el usuario
     * @access public
     * @return bool
     */
    public function existeUsuario(): bool {
        /** Comprueba si existe conexión con la base de datos. */
        if ($this->getCon()) {
            $resultado = $this->getCon()->prepare(
                    "SELECT *
				 FROM Usuario
			     WHERE email = :email");
            $resultado->bindParam(':email', $this->email);
            if ($resultado->execute()) {
                if ($resultado->rowCount() === 1) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Metodo que inserta un usuario en la base de datos
     * @access public
     * @return bool
     */
    public function registrarUsuario() : bool {
		if ($this->getCon()) {
			$resultado = $this->getCon()->prepare(
				"INSERT INTO Usuario (email, password, nombreUsuario)
				 VALUES (:email, :password, :nombre)");
			$resultado->bindParam(':email', $this->email);
			$resultado->bindParam(':password', $this->password);
			$resultado->bindParam(':nombre', $this->nombre);
			if ($resultado->execute()) {
				return true;
			}
		}
		return false;
    }

    /**
     * Metodo que valida un usuario
     * @access public
     * @return bool
     */
    public function validarUsuario(): bool {
        if ($this->getCon()) {
            $resultado = $this->getCon()->prepare(
                "SELECT *
				 FROM Usuario
				 WHERE email = :email AND password = :password");
            $resultado->bindParam(':email', $this->email);
            $resultado->bindParam(':password', $this->password);
            $resultado->execute();
            if ($resultado->rowCount() === 1) {
                $fila = $resultado->fetch();
                $this->email = $fila['email'];
                $this->password = $fila['password'];
                $this->nombre = $fila['nombreUsuario'];
                /** Existe el usuario. */
                return true;
            }
        }
        return false;
    }
}
