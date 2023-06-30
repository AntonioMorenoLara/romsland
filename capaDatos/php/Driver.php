<?php
/**
 * Driver.php
 * Modulo que implementa la clase del driver para la conexion con la BBDD
 */
/**
 * Se crea la clase Driver
 */
class Driver {
    
    /**
	 * @var PDO Conexión con el servidor de bases de datos.
	 * @access private 
	 */
	private $con = null;
	
	/** 
	 * @const string Nombre del origen de datos.
	 */
	private const DSN = "mysql:host=localhost;dbname=DescargaVideojuegos";

	/** 
	 * @const string Nombre del usuario del servidor de bases de datos.
	 * @access private 
	 */
	private const USUARIO = "AntonioProyecto";

	/** 
	 * @const string Password del usuario.
	 * @access private 
	 */
	private const PASSWORD = "proyectofinal1234";

	/** 
	 * @const OPCIONES[]:string Opciones de conexión específicas del controlador.
	 * @access private 
	 */
	private const OPCIONES = array(PDO::MYSQL_ATTR_INIT_COMMAND => 
		'SET CHARACTER SET utf8');
    
    /**
	 * Constructor que establece la conexión con la Base de Datos.
	 * @access public
	 * @return void 
	 */
	public function __construct() {
		$this->pdocon = new PDO(self::DSN, self::USUARIO, self::PASSWORD, 
				self::OPCIONES);
	}
    
    /**
	 * Cierra la conexión con el servidor de la Base de datos.
	 * @access public
	 * @return void 
	 */
	public function __destruct() {
		$this->pdocon = null;
	}

	/**
	 * Método que devuelve la conexión con la base de datos.
	 * @access public
	 * @return PDO
	 */
	public function getCon() : PDO {
		return $this->pdocon;
	}
}
