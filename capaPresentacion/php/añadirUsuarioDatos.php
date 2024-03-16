<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/registroP1.css"/>
    <link rel="shortcut icon" href="../recursos/iconos/Icono.png">
    <title>Registro</title>
</head>
<body>
    <div class="fondo">
    <button class="botonesIdioma"><a href="#es" data-reload class="vinculos" id="bEspañol"><img src="../recursos/iconos/banderaEspaña.png"  class="banderas"> Español</a></button>
    <button class="botonesIdioma"><a href="#eng" data-reload class="vinculos" id="bIngles"><img src="../recursos/iconos/banderaUK.png"  class="banderas"> English</a></button>
    <button class="botonesIdioma"><a href="#pl" data-reload class="vinculos" id="bPolaco"><img src="../recursos/iconos/banderaPolonia.png"  class="banderas"> Polski</a></button>

    <?php

/** Incluye la clase Usuario. */
include '../../capaNegocio/usuario.php';
session_start();

/** Si todos los campos del formulario tienen algún valor... */
if (!empty($_POST['nombre']) && !empty($_POST['prApellido']) && !empty($_POST['email']) && !empty($_POST['fechaNac'])
    && !empty($_POST['username']) && !empty($_POST['contrasena'])) {
    /** @var Usuario Instancia un objeto de la clase. */
    $usuario = new Usuario();
    /** Inicializa los atributos del objeto. */
    $usuario->setNombre($_POST['nombre']);
    $usuario->setPrApellido($_POST['prApellido']);
    /**Inicializa el atributo segundo apellido si no está vacío */
    if(!empty($_POST['segApellido'])){
        $usuario->setSegApellido($_POST['segApellido']);
    }
    $usuario->setEmail($_POST['email']);
    $usuario->setFechaNac($_POST['fechaNac']);
    $usuario->setUsername($_POST['username']);
    $usuario->setContrasena($_POST['contrasena']);
    $fechaActual = date('Y-m-d');
    echo $fechaActual;
    $usuario->setFechaReg($fechaActual);

    /** Inserta los datos en la base de datos */
    if ($usuario->insertarUsuarioDatos()) {

        $_SESSION['usuario'] = $usuario->getEmail();
            /** Redirige a la siguiente parte del registro. */
            header('Location: ../html/registroP2.html');
            die();
    }
    else {
        /** No es posible registrar el usuario. */
        ?>
            <div class="marcoCentral" style="font-size: 18px;" id="login">
                                <h3 style="font-size: 15px; margin-top: -5%">Ha habido un error interno con el registro</h3>
                <form  action="" method="post">
                    <h3 class="titulos" id="titulo">Ha ocurrido un error en el registro</h3>
                    <br><br><br>
                </form>
            </div>
        <?php
    }
}
else {
    /** Si algún campo del formulario no está inicializado... */
    
        echo "<h5>Todos los campos deben estar inicializados</h5>";
    }
    

?>

    </div>
<script src="../js/registro.js"></script>
<script src="../js/previsualizarColor.js"></script>
</body>
</html>