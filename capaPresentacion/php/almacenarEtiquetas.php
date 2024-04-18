<?php
include '../../capaNegocio/etiquetas.php';
session_start();
$contenidos = file_get_contents('php://input');

$array = json_decode($contenidos, true);
//echo $contenidos;
//print_r($array);
$_SESSION['id'] = 10;

/** @var Etiquetas Instancia un objeto de la clase Etiquetas. */
$etiqueta = new Etiquetas();
$etiqueta->setUserId($_SESSION['id']);

foreach ($array as $elemento){
    //print_r($elemento['value']);
    $etiqueta->setEtiquetaId($elemento['value']);
    //echo $etiqueta->getEtiquetaId();
    if($etiqueta->almacenarEtiquetas()){
        echo 'Ok';
    }
}
//echo $contenidos;

/*if(isset($_POST['color'])){
    $color = $_POST['color'];
}else{
    $color = '#a38080';
}*/

//echo $color;
/*
$etiqueta->setIdHTML($_SESSION['id']);

if($perfil->insertarFotosColor()){
    /*header('Location: ../html/registroP3.html');
    echo 'Se han insertado los datos del usuario';
	die();*/
    //echo true;
/*}else{
    //echo 'Ha fallado';
    echo false;
}*/