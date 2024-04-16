<?php
include '../../capaNegocio/perfil.php';
session_start();
$contenidos = file_get_contents('php://input');

$json = json_decode($contenidos, true);
$sourceFilePath = $_SERVER['DOCUMENT_ROOT'] . '/martaAlar/capaPresentacion/recursos/iconos/pfpDefault.png';
$destinationFilePath = $_SERVER['DOCUMENT_ROOT'] . '/martaAlar/capaDatos/pfp/' . $_SESSION['id'] . 'Pfp.png';

$bannerSourceFilePath = $_SERVER['DOCUMENT_ROOT'] . '/martaAlar/capaPresentacion/recursos/iconos/bannerDefault.png';
$bannerDestinationFilePath = $_SERVER['DOCUMENT_ROOT'] . '/martaAlar/capaDatos/banner/' . $_SESSION['id'] . 'Banner.png';

//echo $_SESSION['id'];
//echo $contenidos;
if (isset($_FILES['pfp'])) {
    $pfp = $_FILES['pfp'];
    $pfpTipo = $pfp['type'];
    if ($pfpTipo != 'image/jpeg' && $pfpTipo != 'image/png' && $pfpTipo != 'image/jpg' && $pfpTipo != 'image/gif' && $pfpTipo != 'image/JPG') {
        // Si la imagen no es de ninguno de los tipos especificados...
        if (copy($sourceFilePath, $destinationFilePath)) {
            //echo 'Se ha copiado por defecto';
        } else {
            echo 'Ha fallado por defecto';
        }
    } else {
        // Cuando hay una imagen...
        if (move_uploaded_file($pfp['tmp_name'], $destinationFilePath)) {
            //echo 'Se ha copiado la pfp';
        } else {
            echo 'Ha fallado la pfp';
        }
    }
} else {
    // Si no hay una imagen subida
    if (copy($sourceFilePath, $destinationFilePath)) {
        //echo 'Se ha copiado la pfp por defecto';
    } else {
        echo 'Ha fallado la pfp por defecto';
    }
}


if (isset($_FILES['banner'])) {
    $banner = $_FILES['banner'];
    $bannerTipo = $banner['type'];
    if ($bannerTipo != 'image/jpeg' && $bannerTipo != 'image/png' && $bannerTipo != 'image/jpg' && $bannerTipo != 'image/gif' && $bannerTipo != 'image/JPG') {
        // Si la imagen no es de ninguno de los tipos especificados...
        if (copy($bannerSourceFilePath, $bannerDestinationFilePath)) {
            //echo 'Se ha copiado el banner por defecto';
        } else {
            echo 'Ha fallado la copia del banner por defecto';
        }
    } else {
        // Cuando hay una imagen...
        if (move_uploaded_file($banner['tmp_name'], $bannerDestinationFilePath)) {
            //echo 'Se ha copiado el banner';
        } else {
            echo 'Ha fallado la copia del banner';
        }
    }
} else {
    // Si no hay una imagen subida
    if (copy($bannerSourceFilePath, $bannerDestinationFilePath)) {
        //echo 'Se ha copiado el banner por defecto';
    } else {
        echo 'Ha fallado la copia del banner por defecto';
    }
}

if(isset($_POST['color'])){
    $color = $_POST['color'];
}else{
    $color = '#a38080';
}

//echo $color;
$perfil = new Perfil();
$perfil->setUserId($_SESSION['id']);
$perfil->setFotoPerfil('/capaDatos/pfp/' . $_SESSION['id'] . 'Pfp.png');
$perfil->setBannerPerfil('/capaDatos/banner/' . $_SESSION['id'] . 'Banner.png');
$perfil->setColorPerfil($color);
if($perfil->insertarFotosColor()){
    /*header('Location: ../html/registroP3.html');
    echo 'Se han insertado los datos del usuario';
	die();*/
    return true;
}else{
    //echo 'Ha fallado';
    return false;
}