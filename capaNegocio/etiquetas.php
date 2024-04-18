<?php
/**
 * etiquetas.php
 * Módulo secundario que implementa la clase BDEtiquetas.
 */

/** Incluye la clase. */
include '../../capaDatos/bdetiquetas.php';
include 'usuario.php';
/**
 * Declaración de la clase Etiquetas.
*/
class Etiquetas {
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
	 * Método que devuelve todas las etiquetas almacenadas.
	 *
	 * @access public
	 * @return array[]:Etiqueta	Array de objetos de tipo Etiquetas.
	 */
	public function leeEtiquetas() : array {
		/** @var array[]:Etiqueta Array de objetos de tipo Etiquetas. */
		$arrayEtiquetas = array();
		/** @var BDEtiquetas Instancia un objeto de la clase. */
		$bdetiquetas = new BDEtiquetas();
		/** Inicializa el array de objetos Etiqueta. */
		foreach($bdetiquetas->leeEtiquetas() as $etiqueta) {
			$this->setEtiquetaId($etiqueta['etiquetaid']);
			$this->setNombreEtiquetaES($etiqueta['nombreEtiquetaES']);
			$this->setNombreEtiquetaEN($etiqueta['nombreEtiquetaEN']);
			$this->setIdHTML($etiqueta['idHTML']);
			$arrayEtiquetas[] = $etiqueta;
		}
		/** Devuelve el array. */
		return $arrayEtiquetas;
	}

	/**
	 * Método que devuelve todas las etiquetas almacenadas.
	 *
	 * @access public
	 * @return bool	Array de objetos de tipo Etiquetas.
	 */
	public function almacenarEtiquetas() : bool {
		/** @var array[]:Etiqueta Array de objetos de tipo Etiquetas. */
		$arrayEtiquetas = array();
		/** @var BDEtiquetas Instancia un objeto de la clase BDEtiquetas. */
		$bdetiquetas = new BDEtiquetas();
		/** Inicializa los atributos del objeto. */
		$bdetiquetas->setEtiquetaId($this->etiquetaid);
		$bdetiquetas->setUserId($this->userid);
		/** Inserta un nuevo usuario y comprueba un posible error. */
		if ($bdetiquetas->almacenarEtiquetas()) {
			/** Devuelve true si se ha conseguido. */
			return true;
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}
}