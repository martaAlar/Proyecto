<?php
/**
 * posts.php
 * Módulo secundario que implementa la clase BDPosts.
 */

/** Incluye la clase. */
include_once 'bdgestion.php';
/**
 * Declaración de la clase BDPosts que hereda de BDGestion.
*/
class BDPosts extends BDGestion {
    /**
     * @var int ID del post.
     * @access private 
     */
    private int $postid;

    /**
     * @var int ID del usuario.
     * @access private 
     */
    private int $userid;

    /**
     * @var int ID de la etiqueta asociada.
     * @access private 
     */
    private int $etiquetaid;

    /**
     * @var string Contenido del post.
     * @access private 
     */
    private string $contenido;

    /**
     * @var string Ruta de la foto asociada al post.
     * @access private 
     */
    private string $foto;

    /**
     * @var string Fecha de publicación del post.
     * @access private 
     */
    private string $fechaPublic;

    // Setters

    /**
     * Método que inicializa el atributo $postid.
     * 
     * @access public
     * @param int $postid ID del post.
     * @return void 
     */
    public function setPostId(int $postid): void {
        $this->postid = $postid;
    }

    /**
     * Método que inicializa el atributo $userid.
     * 
     * @access public
     * @param int $userid ID del usuario.
     * @return void 
     */
    public function setUserId(int $userid): void {
        $this->userid = $userid;
    }

    /**
     * Método que inicializa el atributo $etiquetaid.
     * 
     * @access public
     * @param int $etiquetaid ID de la etiqueta asociada.
     * @return void 
     */
    public function setEtiquetaId(int $etiquetaid): void {
        $this->etiquetaid = $etiquetaid;
    }

    /**
     * Método que inicializa el atributo $contenido.
     * 
     * @access public
     * @param string $contenido Contenido del post.
     * @return void 
     */
    public function setContenido(string $contenido): void {
        $this->contenido = $contenido;
    }

    /**
     * Método que inicializa el atributo $foto.
     * 
     * @access public
     * @param string $foto Ruta de la foto asociada al post.
     * @return void 
     */
    public function setFoto(string $foto): void {
        $this->foto = $foto;
    }

    /**
     * Método que inicializa el atributo $fechaPublic.
     * 
     * @access public
     * @param string $fechaPublic Fecha de publicación del post.
     * @return void 
     */
    public function setFechaPublic(string $fechaPublic): void {
        $this->fechaPublic = $fechaPublic;
    }

    // Getters

    /**
     * Método que devuelve el valor del atributo $postid.
     * 
     * @access public
     * @return int ID del post.
     */
    public function getPostId(): int {
        return $this->postid;
    }

    /**
     * Método que devuelve el valor del atributo $userid.
     * 
     * @access public
     * @return int ID del usuario.
     */
    public function getUserId(): int {
        return $this->userid;
    }

    /**
     * Método que devuelve el valor del atributo $etiquetaid.
     * 
     * @access public
     * @return int ID de la etiqueta .
     */
    public function geEtiquetaId(): int {
        return $this->etiquetaid;
    }

    /**
     * Método que devuelve el valor del atributo $contenido.
     * 
     * @access public
     * @return string Contenido del post.
     */
    public function getContenido(): string {
        return $this->contenido;
    }

    /**
     * Método que devuelve el valor del atributo $foto.
     * 
     * @access public
     * @return string Ruta de la foto asociada al post.
     */
    public function getFoto(): string {
        return $this->foto;
    }

    /**
     * Método que devuelve el valor del atributo $fechaPublic.
     * 
     * @access public
     * @return string Fecha de publicación del post.
     */
    public function getFechaPublic(): string {
        return $this->fechaPublic;
    }

    /**
	 * Método que inserta un nuevo post en la base de datos
	 * 
	 * @access public
	 * @return boolean True si tiene éxito y False en otro caso
	 */
	public function insertarPost() : bool {
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
				"INSERT INTO posts (`postid`, `userid`, `etiquetaid`, `contenido`, `foto`, `fechaPublic`) 
				VALUES (NULL, :userid, :etiquetaid, :contenido, :foto, :fechaPublic);"
			);
			/** Vincula los parámetros al nombre de variable especificado. */
			$resultado->bindParam(':userid', $this->userid);
			$resultado->bindParam(':etiquetaid', $this->etiquetaid);
			$resultado->bindParam(':contenido', $this->contenido);
			$resultado->bindParam(':foto', $this->foto);
			$resultado->bindParam(':fechaPublic', $this->fechaPublic);
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
	 * Método que lee los posts del usuario de la base de datos.
	 *
	 * @access public
	 * @return array[]:array[]:string Array de posts.
	 */
	public function cargarPosts(): array {
		/** @var array[]:array[]:string con los datos de las etiquetas. */
		$arrayPosts = array();
		/** Comprueba si existe conexión con la base de datos. */
		if ($this->getPdocon()) {
			/** @var PDOStatement Prepara la sentencia SQL. */
			$resultado = $this->getPdocon()->prepare(
				"SELECT * 
                FROM posts
                WHERE userid = :userid;"
			);
			/** Vincula los parámetros al nombre de variable especificado. */
			$resultado->bindParam(':userid', $this->userid);
			/** Ejecuta la sentencia preparada y comprueba un posible error. */
			if ($resultado->execute()) {
				/** Comprueba que existen etiquetas. */
				if ($resultado->rowCount() > 0) {
					/** Rellenar al array con los datos de las etiquetas. */
					$arrayPosts = $resultado->fetchAll();
				}
			}
		}
		/** Devuelve el array con los datos de lsos posts. */
		return $arrayPosts;
	}
}
