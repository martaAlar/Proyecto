<?php
/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 */

/** Incluye la clase. */
echo 'redes.php antes del include<br>';
include_once 'capaDatos/bdredes.php';
echo 'Incluye la clase bdredes<br>';
//include_once 'usuario.php';
echo 'redes.php despues del include<br>';

/**
 * Declaración de la clase Redes
*/
class Redes extends BDGestion{

	/**
	 * @var string Color del perfil del usuario.
	 * @access private 
	 */
	private string $logoRed;

    /**
	 * @var string Color del perfil del usuario.
	 * @access private 
	 */
	private string $nombreRed;

    /**
	 * @var string Color del perfil del usuario.
	 * @access private 
	 */
	private string $linkRed;

	/**
	 * Método que inicializa el atributo $colorPerfil.
	 * 
	 * @access public
	 * @param string $colorPerfil Color del perfil del usuario.
	 * @return void 
	 */
    public function setLogoRed(string $logoRed): void {
        $this->logoRed = $logoRed;
    }

    /**
	 * Método que inicializa el atributo $colorPerfil.
	 * 
	 * @access public
	 * @param string $colorPerfil Color del perfil del usuario.
	 * @return void 
	 */
    public function setNombreRed(string $nombreRed): void {
        $this->nombreRed = $nombreRed;
    }

    /**
	 * Método que inicializa el atributo $colorPerfil.
	 * 
	 * @access public
	 * @param string $colorPerfil Color del perfil del usuario.
	 * @return void 
	 */
    public function setLinkRed(string $linkRed): void {
        $this->linkRed = $linkRed;
    }

	/**
	 * Método que devuelve el valor del atributo $colorPerfil.
	 * 
	 * @access public
	 * @return string Color del perfil del usuario.
	 */
    public function getLogoRed(): string {
        return $this->logoRed;
    }

    /**
	 * Método que devuelve el valor del atributo $colorPerfil.
	 * 
	 * @access public
	 * @return string Color del perfil del usuario.
	 */
    public function getNombreRed(): string {
        return $this->nombreRed;
    }

    /**
	 * Método que devuelve el valor del atributo $colorPerfil.
	 * 
	 * @access public
	 * @return string Color del perfil del usuario.
	 */
    public function getLinkRed(): string {
        return $this->linkRed;
    }

    /**
     * Método que devuelve todas las redes sociales de un usuario
     * 
     * @access public
     * @return array[]:Redes Array de redes sociales
     */
    public function redesUsuario(): array {
        /**@var array[]:Redes Array de todas las redes sociales de un usuario */
        $arrayRedes = array();
        /**@var BDRedes Instancia un objeto de la clase redes*/
        $bdredes = new BDredes();
        /**Inicializa el array de objetos Redes */
        foreach($bdredes->redesUsuario() as $i){
            $this->logoRed = $i['logoRed'];
            $this->nombreRed = $i['nombreRed'];
            $this->linkRed = $i['linkRed'];
            $arrayRedes[] = clone $this;
			
        }

        return $arrayRedes;
    }

}
