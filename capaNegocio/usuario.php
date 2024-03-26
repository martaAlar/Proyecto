<?php
/**
 * usuario.php
 * Módulo secundario que implementa la clase Usuario.
 */

/** Incluye la clase. */
//echo 'Antes<br>';
include_once '../../capaDatos/bdusuarios.php';
//echo 'Incluye bdusuarios en usuario.php<br>';
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
	 * @var string Fecha de registro del usuario.
	 * @access private 
	 */
	private string $fechaReg;

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
	 * Método que inicializa el atributo fechaNac.
	 * 
	 * @access public
	 * @param string $fechaNac Fecha de nacimiento del usuario.
	 * @return void 
	 */
    public function setFechaReg(string $fechaReg): void {
        $this->fechaReg = $fechaReg;
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
	 * Método que devuelve el valor del atributo fechaReg.
	 * 
	 * @access public
	 * @return string Fecha de registro del usuario.
	 */
    public function getFechaReg(): string {
        return $this->fechaReg;
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
		$bdusuarios = new BDUsuarios();

		/** Inicializa los atributos del objeto. */
		$bdusuarios->setUsername($this->username);
		$bdusuarios->setContrasena($this->contrasena);

		/** Comprueba si existe y gestiona un posible error. */
		if ($bdusuarios->validaUsuario()) {
			/** Inicializa los atributos del objeto con los datos almacenados. */
			$this->username = $bdusuarios->getUsername();
			$this->contrasena = $bdusuarios->getContrasena();

			/** Devuelve true si se ha conseguido. */
			return true;
		}

		/** Devuelve false si se ha producido un error. */
		return false;
	}

	/**
	 * Método que devuelve el ID de un usuario.
	 *
	 * @access public
	 * @return boolean	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function conseguirID() : int {

		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdusuarios = new BDUsuarios();

		/** Inicializa los atributos del objeto. */
		$bdusuarios->setUsername($this->email);

		/** Comprueba si existe y gestiona un posible error. */
		if ($bdusuarios->conseguirID()) {
			/** Inicializa los atributos del objeto con los datos almacenados. */
			$this->userId = $bdusuarios->getUserId();

			/** Devuelve true si se ha conseguido. */
			return $bdusuarios->getUserId();
		}

		/** Devuelve false si se ha producido un error. */
		return 0;
	}
    
	/**
	 * Método que comprueba si existe el usuario.
	 *
	 * @access public
	 * @return boolean	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function existeUsuario() : bool {
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdusuarios = new BDUsuarios();
		/** Inicializa los atributos del objeto. */
		$bdusuarios->setEmail($this->email);
		$bdusuarios->setContrasena($this->contrasena);
		$bdusuarios->setNombre($this->nombre);
		/** Comprueba si existe el usuario. */
		if ($bdusuarios->existeUsuario()) {
			/** El usuario existe. */
			return true;
		}
		/** El usuario no existe. */
		return false;
	}

	/**
	 * Método que comprueba si existe el nombre de usuario.
	 *
	 * @access public
	 * @return boolean	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function existeUser() : bool {
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdusuarios = new BDUsuarios();
		/** Inicializa el atributo username del objeto. */
		$bdusuarios->setUsername($this->username);
		/** Comprueba si existe el nobre de usuario. */
		if ($bdusuarios->existeUser()) {
			/** El usuario existe. */
			return true;
		}
		/** El usuario no existe. */
		return false;
	}

	/**
	 * Método que comprueba si existe el email de usuario.
	 *
	 * @access public
	 * @return boolean	True en caso afirmativo
	 * 					False en caso contrario.
	 */
	public function existeEmail() : bool {
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdusuarios = new BDUsuarios();
		/** Inicializa el atributo username del objeto. */
		$bdusuarios->setEmail($this->email);
		/** Comprueba si existe el nobre de usuario. */
		if ($bdusuarios->existeEmail()) {
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
	public function insertarUsuarioDatos() : bool {
		/** @var BDUsuarios Instancia un objeto de la clase. */
		$bdusuarios = new BDUsuarios();
		/** Inicializa los atributos del objeto. */
		$bdusuarios->setNombre($this->nombre);
		$bdusuarios->setPrApellido($this->prApellido);
		$bdusuarios->setSegApellido($this->segApellido);
		$bdusuarios->setEmail($this->email);
		$bdusuarios->setUsername($this->username);
		$bdusuarios->setContrasena($this->contrasena);
		$bdusuarios->setFechaNac($this->fechaNac);
		$bdusuarios->setFechaReg($this->fechaNac);

		/** Inserta un nuevo usuario y comprueba un posible error. */
		if ($bdusuarios->insertarUsuarioDatos()) {
			/** Devuelve true si se ha conseguido. */
			return true;
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}

	/**
	 * Método para mostrar datos del usuario en el perfil
	 * 
	 * @access public
	 * @return array[]:string
	 */
	/*public function datosPerfil() : array {
		
	}*/
}
