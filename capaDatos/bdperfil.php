<?php
/**
 * bdperfil.php
 * Módulo secundario que implementa la clase BDperfil.
 */

/** Incluye la clase. */
include 'bdgestion.php';
include 'bdusuarios.php';

/**
 * Declaración de la clase BDperfil que hereda de BDUsuario.
*/
class BDperfil extends BDUsuario {
	/**
	 * @var string Color del perfil del usuario.
	 * @access private 
	 */
	private string $colorPerfil;
	/**
	 * Método que inicializa el atributo fechaNac.
	 * 
	 * @access public
	 * @param string $fechaNac Fecha de nacimiento del usuario.
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
