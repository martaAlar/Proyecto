<?php
/**
 * bdusuario.php
 * Módulo secundario que implementa la clase BDUsuario.
 */

/** Incluye la clase. */
echo 'Ya en bdusuarios';
include 'bdgestion.php';

/**
 * Declaración de la clase BDUsuario que hereda de BDGestion.
*/
class BDUsuario extends BDGestion {

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
	 * @var string Color del perfil del usuario.
	 * @access private 
	 */
	private string $colorPerfil;

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
	 * @return string Username del usuario.
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
	 * Método que valida un usuario en la base de datos.
	 * 
	 * @access public
	 * @return boolean True si existe y False en otro caso
	 */
	public function validaUsuario() : bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** @var PDOStatement Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
				"SELECT *
				 FROM usuarios
				 WHERE username = :username AND contrasena = :contrasena");
			/** Vincula un parámetro al nombre de variable especif:contrasenaicado. */
			$resultado->bindParam(':username', $this->username);
			$resultado->bindParam(':contrasena', $this->contrasena);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			$resultado->execute();
			//var_dump($resultado);
			/** Comprueba que el número de filas sea 1. */
			if ($resultado->rowCount() === 1) {
				/** @var array[]:string Accede a los valores obtenidos. */
				$fila = $resultado->fetch();
				//var_dump($fila);
				/** Inicializa los atributos del objeto actual. */
				$this->username = $fila['username'];
				$this->contraseña = $fila['contraseña'];
				/** Existe el usuario. */
				return true;
			}
		}
		/** No existe el usuario. */
		return false;
	}

	/**
	 * Método que inserta un nuevo usuario en la base de datos
	 * 
	 * @access public
	 * @return boolean True si tiene éxito y False en otro caso
	 */
	public function insertaUsuarioPrimParte() : bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
					"INSERT INTO usuarios (username, contrasena, nombre, prApellido, segApellido, email, fechaNac)
					VALUES (:email, :contrasena, :nombre, :prApellido, :segApellido, :email, :fechaNac)");
			/** Vincula los parámetros al nombre de variable especificado. */
			$resultado->bindParam(':username', $this->username);
			$resultado->bindParam(':contrasena', $this->contrasena);
			$resultado->bindParam(':nombre', $this->nombre);
			$resultado->bindParam(':prApellido', $this->prApellido);
			$resultado->bindParam(':segApellido', $this->segApellido);
			$resultado->bindParam(':email', $this->email);
			$resultado->bindParam(':fechaNac', $this->fechaNac);
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
	 * Método que elimina un usuario existente de la base de datos.
	 * 
	 * @access public
	 * @return boolean True si tiene éxito y False en otro caso
	 */
	public function registrarColorPerfil($IdUsuario, $colorPerfil) : bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
				"INSERT INTO perfil(user_id, colorPerfil)
				VALUES (:IdUsuario, :colorPerfil)");
			/** Vincula un parámetro al nombre de variable especificado. */
			$resultado->bindParam(':IdUsuario', $IdUsuario);
			$resultado->bindParam(':colorPerfil', $colorPerfil);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Devuelve true si se ha conseguido. */
				return true;
			}
		}
		/** Devuelve false si se ha producido un error. */
		return false;
	}

}
