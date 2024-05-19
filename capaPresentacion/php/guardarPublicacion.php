<?php
include '../../capaNegocio/post.php';
session_start();
$contenidos = file_get_contents('php://input');

$json = json_decode($contenidos, true);
$destino = $_SERVER['DOCUMENT_ROOT'] . '/martaAlar/capaDatos/publicaciones/' .$_SESSION['id'] . '_Post_'.date("Y_m_d_H_i_s").'.png';

$post = new Post();
//echo $_SESSION['id'];
//echo $contenidos;
/**Si hay una imagen subida... */
if (isset($_FILES['foto'])) {
    $foto = $_FILES['foto'];
    $imagenTipo = $foto['type'];
    if ($imagenTipo != 'image/jpeg' && $imagenTipo != 'image/png' && $imagenTipo != 'image/jpg' && $imagenTipo != 'image/gif' && $imagenTipo != 'image/JPG') {
        // Si la imagen no es de ninguno de los tipos especificados asigna el valor 0
        $post->setFoto(0);
    } else {
        // Cuando hay una imagen...
        if (move_uploaded_file($foto['tmp_name'], $destino)) {
            //echo 'Se ha copiado la foto';
        } else {
            echo 'Ha fallado la foto';
        }
    }
} else {
    // Si no hay una imagen subida, asigna el valor 0
    $post->setFoto(0);
}

if(isset($_POST['etiqueta'])) {
    $etiqueta = intval($_POST['etiqueta']);
    
} else {
    $etiqueta = -1; 
}

if(isset($_POST['texto'])) {
    $texto = $_POST['texto'];
} else {
    $texto = ""; 
}

//echo $color;
$post->setUserId($_SESSION['id']);
$post->setFoto('/capaDatos/publicaciones/' . $_SESSION['id'] . '_Post_'.date("Y_m_d_H_i_s").'.png');
$post->setEtiquetaId($etiqueta);
$post->setFechaPublic(date('Y-m-d'));
$post->setContenido($_POST['texto']);
if($post->insertarPost()){
    /*header('Location: ../html/registroP3.html');
    echo 'Se han insertado los datos del usuario';
	die();*/
    echo true;
}else{
    echo 'Ha fallado';
    //echo false;
}