<?php
/**
 * bdgestion.php
 * Módulo secundario que implementa la clase BDGestion.
 */

/**
 * Declaración de la clase BDGestion.
 * @abstract
*/
abstract class BDGestion {

    /**
     * @var PDO Conexión con el servidor de bases de datos.
     * @access private 
     */
    private $pdocon = null;
    
    /** 
     * @const string Nombre del origen de datos.
     */
    private const DSN = "mysql:host=localhost;dbname=proyecto";

    /** 
     * @const OPCIONES[]:string Opciones de conexión específicas del controlador.
     * @access private 
     */
    private const OPCIONES = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET utf8');    

    /**
     * Constructor de la clase.
     * 
     * @access public
     * @return void 
     */
    public function __construct() {
        try {
            /** Establece la conexión con el servidor de bases de datos. */
            $this->pdocon = new PDO(self::DSN, 'superUser', '1234', self::OPCIONES);
            $this->pdocon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    /**
     * Destructor de la clase.
     * 
     * @access public
     * @return void 
     */
    public function __destruct() {
        /** Cierra la conexión con el servidor de bases de datos. */
        $this->pdocon = null;
    }

    /**
     * Método que devuelve el valor de la conexión.
     * 
     * @access public
     * @return PDO Conexión con el servidor de bases de datos.
     */
    public function getPdocon() : PDO {
        return $this->pdocon;
    }

}

