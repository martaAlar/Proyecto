<?php
/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 */

/** Incluye la clase. */
include '../capaDatos/bdusuarios.php';

/**
 * Declaración de la clase Usuario
*/
class Usuario {

	/**
	 * @var string ID del usuario.
	 * @access private 
	 */
	private string $userId;
    /**
	 * @var string Nombre de usuario del usuario.
	 * @access private 
	 */
	private string $username;
    /**
	 * @var string Nombre del usuario.
	 * @access private 
	 */
    
	private string $nombre;
    /**
	 * @var string Contraseña del usuario.
	 * @access private 
	 */
	private string $contrasena;
    /**
	 * @var string Primer apellido del usuario.
	 * @access private 
	 */
	private string $prApellido;
	/**
	 * @var string Segundo apellido del usuario.
	 * @access private 
	 */
	private string $segApellido;
	
	/**
	 * @var string Dirección de correo electrónico del usuario.
	 * @access private 
	 */
	private string $email;
	
	/**
	 * @var string Fecha de nacimiento del usuario.
	 * @access private 
	 */
	private string $fechaNac;

    /**
	 * Método que inicializa el atributo userId.
	 * 
	 * @access public
	 * @param string $userId ID del usuario.
	 * @return void 
	 */
    public function setUserId(string $userId): void {
        $this->userId = $userId;
    }
    /**
	 * Método que inicializa el atributo username.
	 * 
	 * @access public
	 * @param string $username Username del usuario.
	 * @return void 
	 */
    public function setUsername(string $username): void {
        $this->username = $username;
    }
    /**
	 * Método que inicializa el atributo contraseña.
	 * 
	 * @access public
	 * @param string $contrasena Contraseña del usuario.
	 * @return void 
	 */
    public function setContrasena(string $contrasena): void {
        $this->contrasena = $contrasena;
    }
    /**
	 * Método que inicializa el atributo nombre.
	 * 
	 * @access public
	 * @param string $nombre Nombre del usuario.
	 * @return void 
	 */
    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }
    /**
	 * Método que inicializa el atributo prApellido.
	 * 
	 * @access public
	 * @param string $prApellido Primer apellido del usuario.
	 * @return void 
	 */
    public function setPrApellido(string $prApellido): void {
        $this->prApellido = $prApellido;
    }
    /**
	 * Método que inicializa el atributo segApellido.
	 * 
	 * @access public
	 * @param string $segApellido Segundo apellido del usuario.
	 * @return void 
	 */
    public function setSegApellido(string $segApellido): void {
        $this->segApellido = $segApellido;
    }
    /**
	 * Método que inicializa el atributo email.
	 * 
	 * @access public
	 * @param string $email Dirección de correo electrónico del usuario.
	 * @return void 
	 */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
	 * Método que inicializa el atributo fechaNac.
	 * 
	 * @access public
	 * @param string $fechaNac Fecha de nacimiento del usuario.
	 * @return void 
	 */
    public function setFechaNac(string $fechaNac): void {
        $this->fechaNac = $fechaNac;
    }



    /**
	 * Método que devuelve el valor del atributo userId.
	 * 
	 * @access public
	 * @return string ID del usuario.
	 */
    public function getUserId(): string {
        return $this->userId;
    }
    /**
	 * Método que devuelve el valor del atributo username.
	 * 
	 * @access public
	 * @return string Username del usuario.
	 */
    public function getUsername(): string {
        return $this->username;
    }
    /**
	 * Método que devuelve el valor del atributo $contrasena.
	 * 
	 * @access public
	 * @return string Contraseña del usuario.
	 */
    public function getContrasena(): string {
        return $this->contrasena;
    }
    /**
	 * Método que devuelve el valor del atributo nombre.
	 * 
	 * @access public
	 * @return string Nombre del usuario.
	 */
    public function getNombre(): string {
        return $this->nombre;
    }
    /**
	 * Método que devuelve el valor del atributo prApellido.
	 * 
	 * @access public
	 * @return string Primer apellido del usuario.
	 */
    public function getPrApellido(): string {
        return $this->prApellido;
    }
    /**
	 * Método que devuelve el valor del atributo segApellido.
	 * 
	 * @access public
	 * @return string Segundo apellido del usuario.
	 */
    public function getSegApellido(): string {
        return $this->segApellido;
    }
    /**
	 * Método que devuelve el valor del atributo email.
	 * 
	 * @access public
	 * @return string Email del usuario.
	 */
    public function getEmail(): string {
        return $this->email;
    }
    /**
	 * Método que devuelve el valor del atributo fechaNac.
	 * 
	 * @access public
	 * @return string Fecha de nacimiento del usuario.
	 */
    public function getFechaNac(): string {
        return $this->fechaNac;
    }



    /**
	 * Método que valida un usuario.
	 *
	 * @access public
	 * @return boolean	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function validaUsuario() : bool {

		/** @var BDUsuario Instancia un objeto de la clase. */
		$bdusuario = new BDUsuario();

		/** Inicializa los atributos del objeto. */
		$bdusuario->setUsername($this->username);
		$bdusuario->setContrasena($this->contrasena);

		/** Comprueba si existe y gestiona un posible error. */
		if ($bdusuario->validaUsuario()) {
			/** Inicializa los atributos del objeto con los datos almacenados. */
			$this->username = $bdusuario->getUsername();
			$this->contrasena = $bdusuario->getContrasena();

			/** Devuelve true si se ha conseguido. */
			return true;
		}

		/** Devuelve false si se ha producido un error. */
		return false;
	}


    
	/**
	 * Método que comprueba si existe el usuario.
	 *
	 * @access public
	 * @return boolean	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function existeUsuario() : bool {
		/** @var BDUsuario Instancia un objeto de la clase. */
		$bdusuario = new BDUsuario();
		/** Inicializa los atributos del objeto. */
		$bdusuario->setEmail($this->email);
		$bdusuario->setContrasena($this->contrasena);
		$bdusuario->setNombre($this->nombre);
		/** Comprueba si existe el usuario. */
		if ($bdusuario->existeUsuario()) {
			/** El usuario existe. */
			return true;
		}
		/** El usuario no existe. */
		return false;
	}

	/**
	 * Método que añade un nuevo usuario.
	 *
	 * @access public
	 * @return boolean	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function almacenaUsuario() : bool {
		/** @var BDUsuario Instancia un objeto de la clase. */
		$bdusuario = new BDUsuario();
		/** Inicializa los atributos del objeto. */
		$bdusuario->setEmail($this->email);
		$bdusuario->setContrasena($this->contrasena);
		$bdusuario->setNombre($this->nombre);
		/** Inserta un nuevo usuario y comprueba un posible error. */
		if ($bdusuario->insertaUsuario()) {
			/** Devuelve true si se ha conseguido. */
			return true;
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}

}
