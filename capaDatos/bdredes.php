<?php
/**
 * bdredes.php
 * Módulo secundario que implementa la clase BDperfil.
 */

/** Incluye la clase. */
echo 'Lo ha pasado';
include 'bdusuarios.php';
echo 'Incluye bdusuarios';

/**
 * Declaración de la clase BDperfil que hereda de BDUsuario.
*/
class BDredes extends BDUsuarios {
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
    /**
     * Método que devuelve todas las redes sociales de un usuario
     * 
     * @access public
     * @return array[]:array[]:string Array de redes
     */
    public function redesUsuario(): array {
        /**@var array[]:array[]:string Array de todas las redes sociales de un usuario */
        $arrayRedes = array();
        /**Comprueba si existe conexión con la base de datos */
        if($this->getPdocon()){
            /**@var ^DPStatement Prepara la sentencia SQL */
            $resultado = $this->getPdocon()->prepare(
                "SELECT *
                FROM redesSociales
                WHERE user_id = 1"
            );
            /**Ejecuta la sentencia preparada y comprueba un posible error */
            if($resultado->execute()){
                if($resultado->rowCount() > 0){
                    $arrayRedes = $resultado->fetchAll();
                }
            }
        }
        return $arrayRedes;
    }
    
}
