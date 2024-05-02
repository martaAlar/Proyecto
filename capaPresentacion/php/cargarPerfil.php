<?php
include '../../capaNegocio/perfil.php';
include '../../capaNegocio/etiquetas.php';
session_start();
/**Manda la información al módulo de JavaScript */
header('Content-Type: application/json');
/** @var Usuario Instancia un objeto de la clase Usuario. */
$usuario = new Usuario();
$usuario->setUserId($_SESSION['id']);
/** @var Perfil Instancia un objeto de la clase Perfil. */
$perfil = new Perfil();
$perfil->setUserId($_SESSION['id']);
/** @var Etiquetas Instancia un objeto de la clase Perfil. */
$etiqueta = new Etiquetas();
$etiqueta->setUserId($_SESSION['id']);
//$datosPerfil = $perfil->cargarInformacionPerfil() . $usuario->cargarInformacionPerfil();

$datosPerfil[0] = $usuario->cargarInformacionPerfil();
$datosPerfil[1] =  $perfil->cargarInformacionPerfil();
$datosPerfil[2] =  $etiqueta->cargarEtiquetasPerfil();
echo json_encode($datosPerfil);
