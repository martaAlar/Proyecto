<?php
include '../../capaNegocio/etiquetas.php';
session_start();
$contenidos = file_get_contents('php://input');

$array = json_decode($contenidos, true);
//echo $contenidos;
//print_r($array);
$bandera = true;
/** @var Etiquetas Instancia un objeto de la clase Etiquetas. */
$etiqueta = new Etiquetas();
$etiqueta->setUserId($_SESSION['id']);

foreach ($array as $elemento){
    //print_r($elemento['value']);
    $etiqueta->setEtiquetaId($elemento['value']);
    //echo $etiqueta->getEtiquetaId();
    if($etiqueta->almacenarEtiquetas()){
    }else{
        $bandera = false;
    }
}

echo $bandera;
//echo $contenidos;

/*
*/