<?php
/** Incluye la clase Usuario. */
include '../../capaNegocio/usuario.php';
/**Recibe la información del módulo de JavaScript */
header('Content-Type: text/plain');
$datos = file_get_contents('php://input'); 

    /** @var Usuario Instancia un objeto de la clase. */
    $usuario = new Usuario();
    /** Inicializa los atributos del objeto. */
    $usuario->setUsername($datos);
    /**Si existe el usuario... */
    if($usuario->existeUser()){
        /**...devuelve true */
        echo 'true';
    }else{
        /**SI no existe, devuelve false */
        echo 'false';
    }
//echo json_encode($datos);

