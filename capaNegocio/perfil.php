<?php
/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 */

/** Incluye la clase. */
include '../../capaDatos/bdperfil.php';
include 'usuario.php';

/**
 * Declaración de la clase Usuario
*/
class Perfil extends Usuario{
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
	 * Método que valida un usuario.
	 *
	 * @access public
	 * @return boolean	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function validaUsuario() : bool {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdperfil = new BDperfil();
		/** Inicializa los atributos del objeto. */
		$bdperfil->setUserId($this->userid);
		$bdperfil->setColorPerfil($this->colorPerfil);
		$bdperfil->setFotoPerfil($this->fotoPerfil);
		$bdperfil->setBannerPerfil($this->bannerPerfil);

		/** Comprueba si existe y gestiona un posible error. */
		if ($bdperfil->insertarFotosColor()) {
			/** Devuelve true si se ha conseguido. */
			return true;
		}

		/** Devuelve false si se ha producido un error. */
		return false;
	}

	/**
	 * Método que inserta los datos de color e imagenes del usuario en la base de datos
	 * 
	 * @access public
	 * @return boolean True si tiene éxito y False en otro caso
	 */
	public function insertarFotosColor() : bool {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdperfil = new BDperfil();
		/** Inicializa los atributos del objeto. */
		$bdperfil->setUserId($this->userid);
		$bdperfil->setColorPerfil($this->colorPerfil);
		$bdperfil->setFotoPerfil($this->fotoPerfil);
		$bdperfil->setBannerPerfil($this->bannerPerfil);

		/** Comprueba si existe y gestiona un posible error. */
		if ($bdperfil->insertarFotosColor()) {
			/** Devuelve true si se ha conseguido. */
			return true;
		}

		/** Devuelve false si se ha producido un error. */
		return false;
	}
}
