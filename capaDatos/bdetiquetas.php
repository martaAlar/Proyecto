<?php
/**
 * bdetiquetas.php
 * Módulo secundario que implementa la clase BDetiquetas.
 */

/** Incluye la clase. */
include 'bdgestion.php';
include 'bdusuarios.php';

/**
 * Declaración de la clase BDperfil que hereda de BDGestion.
*/
class BDEtiquetas extends BDGestion{
    /**
	 * @var int ID de la etiqueta.
	 * @access private 
	 */
	private int $etiquetaid;

	/**
	 * @var int ID del usuario.
	 * @access private 
	 */
	private int $userid;

    /**
	 * @var string Nombre de la etiqueta en español.
	 * @access private 
	 */
	private string $nombreEtiquetaES;

	/**
	 * @var string Nombre de la etiqueta en inglés.
	 * @access private 
	 */
	private string $nombreEtiquetaEN;

	/**
	 * @var string Nombre de ID de la etiqueta.
	 * @access private 
	 */
	private string $idHTML;

    /**
	 * Método que inicializa el atributo $etiquetaid.
	 * 
	 * @access public
	 * @param string $etiquetaid ID de la etiqueta.
	 * @return void 
	 */
    public function setEtiquetaId(int $etiquetaid): void {
        $this->etiquetaid = $etiquetaid;
    }

	/**
	 * Método que inicializa el atributo $userid.
	 * 
	 * @access public
	 * @param int $userid ID del usuario.
	 * @return void 
	 */
    public function setUserId(int $userid): void {
        $this->userid = $userid;
    }

	/**
	 * Método que inicializa el atributo $nombreEtiquetaES.
	 * 
	 * @access public
	 * @param string $nombreEtiquetaES Nombre de la etiqueta en español.
	 * @return void 
	 */
    public function setNombreEtiquetaES(string $nombreEtiquetaES): void {
        $this->nombreEtiquetaES = $nombreEtiquetaES;
    }

	/**
	 * Método que inicializa el atributo $nombreEtiquetaEN.
	 * 
	 * @access public
	 * @param string $nombreEtiquetaEN Nombre de la etiqueta en inglés.
	 * @return void 
	 */
    public function setNombreEtiquetaEN(string $nombreEtiquetaEN): void {
        $this->nombreEtiquetaEN = $nombreEtiquetaEN;
    }

	/**
	 * Método que inicializa el atributo $nombreEtiquetaEN.
	 * 
	 * @access public
	 * @param string $nombreEtiquetaEN Nombre de ID de la etiqueta.
	 * @return void 
	 */
    public function setIdHTML(string $idHTML): void {
        $this->idHTML = $idHTML;
    }

	/**
	 * Método que devuelve el valor del atributo $etiquetaid.
	 * 
	 * @access public
	 * @return string ID de la etiqueta.
	 */
    public function getEtiquetaId(): int {
        return $this->etiquetaid;
    }

	/**
	 * Método que devuelve el valor del atributo $userid.
	 * 
	 * @access public
	 * @return int ID del usuario.
	 */
    public function getUserId(): int {
        return $this->userid;
    }

	/**
	 * Método que devuelve el valor del atributo $nombreEtiquetaES.
	 * 
	 * @access public
	 * @return string Nombre de la etiqueta en español.
	 */
    public function getNombreEtiquetaES(): string {
        return $this->nombreEtiquetaES;
    }

	/**
	 * Método que devuelve el valor del atributo $nombreEtiquetaEN.
	 * 
	 * @access public
	 * @return string Nombre de la etiqueta en inglés.
	 */
    public function getNombreEtiquetaEN(): string {
        return $this->nombreEtiquetaEN;
    }

	/**
	 * Método que devuelve el valor del atributo $idHTML.
	 * 
	 * @access public
	 * @return string Nombre de ID de la etiqueta.
	 */
    public function getIdHTML(): string {
        return $this->idHTML;
    }

    /**
	 * Método que lee todas las etiquetas de la base de datos.
	 *
	 * @access public
	 * @return array[]:array[]:string Array de etiquetas.
	 */
	public function leeEtiquetas(): array {
		/** @var array[]:array[]:string con los datos de las etiquetas. */
		$arrayEtiquetas = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** @var PDOStatement Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
				"SELECT *
                 FROM etiquetas");
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Comprueba que existen etiquetas. */
				if ($resultado->rowCount() > 0) {
					/** Rellenar al array con los datos de las etiquetas. */
					$arrayEtiquetas = $resultado->fetchAll();
				}
			}
		}
		/** Devuelve el array con los datos de las etiquetas. */
		return $arrayEtiquetas;
	}

	/**
	 * Método que inserta los datos de color e imagenes del usuario en la base de datos
	 * 
	 * @access public
	 * @return boolean True si tiene éxito y False en otro caso
	 */
	public function almacenarEtiquetas() : bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
				"INSERT INTO etiquetasusuario (`userid`, `etiquetaid`) 
				VALUES (:userid, :etiquetaid);"
			);
			/** Vincula los parámetros al nombre de variable especificado. */
			$resultado->bindParam(':userid', $this->userid);
			$resultado->bindParam(':etiquetaid', $this->etiquetaid);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Devuelve true si se ha conseguido. */
				return true;
			}
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}
}