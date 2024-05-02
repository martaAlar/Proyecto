<?php
/** Incluye la clase Etiquetas. */
include '../../capaNegocio/etiquetas.php';
/**Manda la información al módulo de JavaScript */
header('Content-Type: application/json');
/** @var Etiquetas Instancia un objeto de la clase Etiquetas. */
$etiqueta = new Etiquetas();
/** Inicializa los atributos del objeto. */
$datos = $etiqueta->leeEtiquetas();

//echo $datos->etiquetaid;
echo json_encode($datos);
