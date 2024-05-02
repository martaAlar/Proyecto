<?php
/**
 * bdperfil.php
 * Módulo secundario que implementa la clase BDperfil.
 */

/** Incluye la clase. */
include_once 'bdgestion.php';
//include 'bdusuarios.php';

/**
 * Declaración de la clase BDperfil que hereda de BDUsuario.
*/
class BDperfil extends BDGestion {
	/**
	 * @var string ID del usuario.
	 * @access private 
	 */
	private int $userid;

	/**
	 * @var string Foto de perfil del usuario.
	 * @access private 
	 */
	private string $fotoPerfil;

	/**
	 * @var string Color del perfil del usuario.
	 * @access private 
	 */
	private string $colorPerfil;

	/**
	 * @var string Banner de perfil del usuario.
	 * @access private 
	 */
	private string $bannerPerfil;

	/**
	 * @var string Descripcion del usuario.
	 * @access private 
	 */
	private string $descripcion;

	/**
	 * @var string Tamaño del texto del perfil del usuario.
	 * @access private 
	 */
	private string $tamanoTexto;

	/**
	 * Método que inicializa el atributo $userid.
	 * 
	 * @access public
	 * @param string $userid ID del usuario.
	 * @return void 
	 */
    public function setUserId(int $userid): void {
        $this->userid = $userid;
    }

	/**
	 * Método que inicializa el atributo $fotoPerfil.
	 * 
	 * @access public
	 * @param string $fotoPerfil Foto del perfil del usuario.
	 * @return void 
	 */
    public function setFotoPerfil(string $fotoPerfil): void {
        $this->fotoPerfil = $fotoPerfil;
    }

	/**
	 * Método que inicializa el atributo $colorPerfil.
	 * 
	 * @access public
	 * @param string $colorPerfil Color del perfil del usuario.
	 * @return void 
	 */
    public function setColorPerfil(string $colorPerfil): void {
        $this->colorPerfil = $colorPerfil;
    }

	/**
	 * Método que inicializa el atributo $banner.
	 * 
	 * @access public
	 * @param string $colorPerfil Banner del perfil del usuario.
	 * @return void 
	 */
    public function setBannerPerfil(string $bannerPerfil): void {
        $this->bannerPerfil = $bannerPerfil;
    }

	/**
	 * Método que inicializa el atributo $descripcion.
	 * 
	 * @access public
	 * @param string $descripcion Descripcion del perfil del usuario.
	 * @return void 
	 */
    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

	/**
	 * Método que inicializa el atributo $tamanoTexto.
	 * 
	 * @access public
	 * @param string $colorPerfil Tamaño del texto del perfil del usuario.
	 * @return void 
	 */
    public function setTamanoTexto(string $tamanoTexto): void {
        $this->tamanoTexto = $tamanoTexto;
    }

	/**
	 * Método que devuelve el valor del atributo $userid.
	 * 
	 * @access public
	 * @return string ID del perfil del usuario.
	 */
    public function getUserId(): int {
        return $this->userid;
    }

	/**
	 * Método que devuelve el valor del atributo $colorPerfil.
	 * 
	 * @access public
	 * @return string Color del perfil del usuario.
	 */
    public function getColorPerfil(): string {
        return $this->colorPerfil;
    }

	/**
	 * Método que devuelve el valor del atributo $fotoPerfil.
	 * 
	 * @access public
	 * @return string Foto del perfil del usuario.
	 */
    public function getFotoPerfil(): string {
        return $this->fotoPerfil;
    }

	/**
	 * Método que devuelve el valor del atributo $descripcion.
	 * 
	 * @access public
	 * @return string Descripción del perfil del usuario.
	 */
    public function getDescripcion(): string {
        return $this->descripcion;
    }

	/**
	 * Método que devuelve el valor del atributo $colorPerfil.
	 * 
	 * @access public
	 * @return string Color del perfil del usuario.
	 */
    public function getBannerPerfil(): string {
        return $this->bannerPerfil;
    }

	/**
	 * Método que devuelve el valor del atributo $tamanoTexto.
	 * 
	 * @access public
	 * @return string Tamaño del texto del perfil del usuario.
	 */
    public function getTamanoTexto(): string {
        return $this->tamanoTexto;
    }

	/**
	 * Método que inserta los datos de color e imagenes del usuario en la base de datos
	 * 
	 * @access public
	 * @return boolean True si tiene éxito y False en otro caso
	 */
	public function insertarFotosColor() : bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
				"INSERT INTO perfil (`userid`, `fotoPerfil`, `colorPerfil`, `bannerPerfil`) 
				VALUES (:userid, :fotoPerfil, :colorPerfil, :bannerPerfil);"
			);
			/** Vincula los parámetros al nombre de variable especificado. */
			$resultado->bindParam(':userid', $this->userid);
			$resultado->bindParam(':fotoPerfil', $this->fotoPerfil);
			$resultado->bindParam(':colorPerfil', $this->colorPerfil);
			$resultado->bindParam(':bannerPerfil', $this->bannerPerfil);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Devuelve true si se ha conseguido. */
				return true;
			}
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}

	/**
	 * Método que inserta los datos de descripcion del usuario en la base de datos
	 * 
	 * @access public
	 * @return boolean True si tiene éxito y False en otro caso
	 */
	public function insertarDescripcion() : bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
				"UPDATE perfil 
				SET descripcion = :descripcion
				WHERE `userid` = :userid;"
			);
			/** Vincula los parámetros al nombre de variable especificado. */
			$resultado->bindParam(':userid', $this->userid);
			$resultado->bindParam(':descripcion', $this->descripcion);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Devuelve true si se ha conseguido. */
				return true;
			}
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}

	/**
	 * Método que carga la información del perfil del usuario de la base de datos.
	 *
	 * @access public
	 * @return array[]:array[]:string Array de perfil.
	 */
	public function cargarPerfil(): array {
		/** @var array[]:array[]:string con los datos del perfil. */
		$arrayPerfil = array();
		//var_dump($this->email);
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** @var PDOStatement Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
				"SELECT fotoPerfil, colorPerfil, bannerPerfil, descripcion
				FROM perfil
				WHERE userid = :userid");
			/** Vincula los parámetros al nombre de variable especificado. */
			$resultado->bindParam(':userid', $this->userid);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Comprueba que existan datos. */
				if ($resultado->rowcount() == 1) {
					/** @var array[]:string Almacena los datos de la consulta. */
					$arrayPerfil = $resultado->fetch();
					/** Asigna los datos a las propiedades del objeto actual. */
					/*$this->fotoPerfil = $fila['fotoPerfil'];
					$this->colorPerfil = $fila['colorPerfil'];
					$this->bannerPerfil = $fila['bannerPerfil'];
					$this->descripcion = $fila['descripcion'];*/
				}
			}
		}
		/** Devuelve el array con los datos del perfil. */
		return $arrayPerfil;
	}
    
}
