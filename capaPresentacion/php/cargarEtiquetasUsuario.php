<?php
include '../../capaNegocio/etiquetas.php';
session_start();
/**Manda la información al módulo de JavaScript */
header('Content-Type: application/json');
/** @var Etiquetas Instancia un objeto de la clase Perfil. */
$etiqueta = new Etiquetas();
$etiqueta->setUserId($_SESSION['id']);
//$datosPerfil = $perfil->cargarInformacionPerfil() . $usuario->cargarInformacionPerfil();
echo json_encode($etiqueta->cargarEtiquetasPerfil());
//echo $_SESSION['id'];