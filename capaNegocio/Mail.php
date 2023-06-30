<?php

/**
 * Mail.php
 * Implementacion de la clase Mail
 */
class Mail {

    /** @const DESTINATARIO Email destinatario. */
    private const DESTINATARIO = "proyectofinalantonio2001@gmail.com";

    /**
     * @var string Almacena el email
     * @access private
     */
    private string $email;

    /**
     * @var string Almacena el asunto del email
     * @access private
     */
    private string $asunto;

    /**
     * @var string Almacena el mensaje del email
     * @access private
     */
    private string $mensaje;

    /**
     * Inicializa el email
     * @access public
     * @param string $email
     * @return void
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * Inicialiaza el asunto
     * @access public
     * @param string $asunto
     * @return void
     */
    public function setAsunto(string $asunto): void {
        $this->asunto = $asunto;
    }

    /**
     * Inicializa el mensaje
     * @access public
     * @param string $mensaje
     * @return void
     */
    public function setMensaje(string $mensaje): void {
        $this->mensaje = $mensaje;
    }

    /**
     * Obtiene el email
     * @access public
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Obtiene el asunto
     * @access public
     * @return string
     */
    public function getAsunto(): string {
        return $this->asunto;
    }

    /**
     * Obtiene el mensaje
     * @access public
     * @return string
     */
    public function getMensaje(): string {
        return $this->mensaje;
    }

    public function mandarEmail() {

        $cuerpo = '<h3>'.$this->mensaje.'</h3>';
        
        $cabeceras = "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-type: text/html; charset-utf8\r\n";
        $cabeceras .= "From: ".$this->email;
        return (mail(self::DESTINATARIO, $this->asunto, $cuerpo, $cabeceras));
    }

}
