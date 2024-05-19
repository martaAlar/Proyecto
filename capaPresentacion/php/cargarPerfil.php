<?php
include '../../capaNegocio/perfil.php';
include '../../capaNegocio/etiquetas.php';
include '../../capaNegocio/usuario.php';
include '../../capaNegocio/post.php';
include '../../capaNegocio/interaccion.php';
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
/** @var Post Instancia un objeto de la clase Perfil. */
$posts = new Post();
$posts->setUserId($_SESSION['id']);
/** @var Interaccion Instancia un objeto de la clase Perfil. */
$interaccion = new Interaccion();
$interaccion->setRealizanteid($_SESSION['id']);

$datosPerfil[0] = $usuario->cargarInformacionPerfil();
$datosPerfil[1] = $perfil->cargarInformacionPerfil();
$datosPerfil[2] = $etiqueta->cargarEtiquetasPerfil();
$datosPerfil[3] = $posts->cargarPosts();
$datosPerfil[4] = $interaccion->cargarPerfilesMatching();
echo json_encode($datosPerfil);
//echo $_SESSION['id'];