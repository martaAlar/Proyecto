<?php
/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 */

/** Incluye la clase. */
//echo 'Antes<br>';
include '../../capaDatos/bdinteracciones.php';
//echo 'Incluye bdusuarios en usuario.php<br>';
/**
 * Declaración de la clase Usuario
*/
class Interaccion {
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
	 * Método que inicializa el atributo $accion.
	 * 
	 * @access public
	 * @param string $accion ID de la acción que se realiza.
	 * @return void 
	 */
    public function setAccion(int $accion): void {
        $this->accion = $accion;
    }
    
    /**
	 * Método que devuelve el valor del atributo $realizanteid.
	 * 
	 * @access public
	 * @return string ID del usuario que realiza la acción.
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
	 * @return string ID de la acción que se realiza.
	 */
    public function getAccion(): int {
        return $this->accion;
    }
    /**
	 * Método que carga los perfiles seleccionados para el matching.
	 *
	 * @access public
	 * @return array[]:Post	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function cargarPerfilesMatching() : array {
		/** @var array[]:interacciones Array de objetos de tipo Post. */
		$arrayPerfiles = array();
		/** @var BDinteracciones Instancia un objeto de la clase. */
		$bdinteracciones = new BDinteracciones();
		/** Inicializa los atributos del objeto. */
		$bdinteracciones->setRealizanteID($this->realizanteid);
		/** Inicializa el array. */
		foreach($bdinteracciones->cargarPerfilesMatching() as $valor) {
			$usuario = new Usuario();
			$perfil = new Perfil();
			$usuario->setUserId($valor[0]);
			$usuario->setUsername($valor[1]);
			$usuario->setNombre($valor[2]);
			$usuario->setPrApellido($valor[3]);
			$perfil->setFotoPerfil($valor[4]);
			/*$perfilUsuario = [
                'usuario' => [
                    'userid' => $valor[0],
                    'username' => $valor[1],
                    'nombre' => $valor[2],
                    'prApellido' => $valor[3],
                ],
                'perfil' => [
                    'fotoPerfil' => $valor[4]
                ]
            ];*/
			$arrayPerfiles[] = $valor;
		}
		/** Devuelve el array. */
		return $arrayPerfiles;
		//return $bdinteracciones->cargarPerfilesMatching();
	}
    
}
