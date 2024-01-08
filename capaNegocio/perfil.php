<?php
/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 */

/** Incluye la clase. */
include '../capaDatos/bdusuarios.php';
include 'usuario.php';

/**
 * Declaración de la clase Usuario
*/
class Perfil {

	/**
	 * @var string Color del perfil del usuario.
	 * @access private 
	 */
	private string $colorPerfil;

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
	 * Método que devuelve el valor del atributo $colorPerfil.
	 * 
	 * @access public
	 * @return string Color del perfil del usuario.
	 */
    public function getColorPerfil(): string {
        return $this->colorPerfil;
    }


}
