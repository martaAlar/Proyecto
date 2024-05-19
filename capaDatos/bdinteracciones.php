<?php
/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 */

/** Incluye la clase. */
//echo 'Antes<br>';
//include '../../capaDatos/bdinteraccion.php';
//echo 'Incluye bdusuarios en usuario.php<br>';
/**
 * Declaración de la clase Usuario
*/
class BDinteracciones extends BDUsuarios{
	/**
	 * @var int ID del usuario que realiza la acción.
	 * @access private 
	 */
	private int $realizanteid;

    /**
	 * @var int ID del usuario que recibe la acción.
	 * @access private 
	 */
	private int $receptorid;
    
    /**
	 * @var int ID de la acción que se realiza.
	 * @access private 
	 */
	private int $accion;

    /**
	 * Método que inicializa el atributo $realizanteid.
	 * 
	 * @access public
	 * @param int $realizanteid ID del usuario que realiza la acción.
	 * @return void 
	 */
    public function setRealizanteid(int $realizanteid): void {
        $this->realizanteid = $realizanteid;
    }

    /**
	 * Método que inicializa el atributo $receptorid.
	 * 
	 * @access public
	 * @param int $receptorid ID del usuario que recibe la acción.
	 * @return void 
	 */
    public function setReceptorid(int $receptorid): void {
        $this->receptorid = $receptorid;
    }
    
    /**
	 * Método que inicializa el atributo $contraseña.
	 * 
	 * @access public
	 * @param int $accion ID de la acción que se realiza.
	 * @return void 
	 */
    public function setAccion(int $accion): void {
        $this->accion = $accion;
    }
    
    /**
	 * Método que devuelve el valor del atributo $realizanteid.
	 * 
	 * @access public
	 * @return int ID del usuario que realiza la acción.
	 */
    public function getRealizanteid(): int {
        return $this->realizanteid;
    }
    /**
	 * Método que devuelve el valor del atributo $receptorid.
	 * 
	 * @access public
	 * @return int ID del usuario que recibe la acción.
	 */
    public function getReceptorid(): int {
        return $this->receptorid;
    }
    /**
	 * Método que devuelve el valor del atributo $accion.
	 * 
	 * @access public
	 * @return int ID de la acción que se realiza.
	 */
    public function getAccion(): int {
        return $this->accion;
    }

    /**
	 * Método que lee usuarios relacionados con el usuario actual de la base de datos.
	 *
	 * @access public
	 * @return array[]:array[]:string Array de interacciones.
	 */
	public function cargarPerfilesMatching(): array {
		/** @var array[]:array[]:string con los datos de los perfiles. */
		$arrayPerfiles = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** @var PDOStatement Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
				"SELECT u.userid, u.username, u.nombre, u.prApellido, perfil.fotoPerfil
                FROM usuarios u, perfil 
                WHERE u.userid != :realizanteid
                AND EXISTS (
                    SELECT eu1.etiquetaid, e.nombreEtiquetaES AS nombreEtiqueta
                    FROM etiquetasUsuario eu1
                    INNER JOIN etiquetasUsuario eu2 ON eu1.etiquetaid = eu2.etiquetaid
                    INNER JOIN etiquetas e ON eu1.etiquetaid = e.etiquetaid
                    WHERE eu1.userid = :realizanteid
                    AND eu2.userid = u.userid
                )
                AND NOT EXISTS (
                    SELECT 1
                    FROM interaccion i
                    WHERE (i.realizanteid = :realizanteid AND i.receptorid = u.userid AND (i.accion = 2 OR i.accion = 3))
                       OR (i.receptorid = :realizanteid AND i.realizanteid = u.userid AND (i.accion = 2 OR i.accion = 3))
                )
				ORDER BY RAND()
				LIMIT 3;
                "
			);
			/** Vincula los parámetros al nombre de variable especificado. */
			$resultado->bindParam(':realizanteid', $this->realizanteid);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Comprueba que existen etiquetas. */
				if ($resultado->rowCount() > 0) {
					/** Rellenar al array con los datos de las etiquetas. */
					$arrayPerfiles = $resultado->fetchAll();
				}
			}
		}
		/** Devuelve el array con los datos de las etiquetas. */
		return $arrayPerfiles;
	}
    
}