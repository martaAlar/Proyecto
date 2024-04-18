<?php
include '../../capaNegocio/perfil.php';
session_start();
$descripcion = file_get_contents('php://input');
//echo $color;
$perfil = new Perfil();
$perfil->setUserId($_SESSION['id']);
$perfil->setDescripcion($descripcion);

if($perfil->insertarDescripcion()){
    echo true;
}else{
    echo false;
}