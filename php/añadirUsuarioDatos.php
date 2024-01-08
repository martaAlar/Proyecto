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
include '../capaNegocio/usuario.php';

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
    $usuario->setColorPerfil($_POST['color']);
    /** Inserta los datos en la base de datos */
    if ($usuario->insertarUsuarioPrimParte()) {
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
                    <h3 class="titulos" id="titulo">Inicio de sesión </h3>
                    <input class="formularioEntrada" name="username" placeholder="Nombre de usuario" type="text" id="nombre">
                    <br><br>
                    <input  class="formularioEntrada" name="contrasena" placeholder="Contraseña" type="password" id="password">
                    <br><br><br>
                    <input type="submit" name="Enviar" value="Entrar" class="botones" id="boton">
                </form>
                <a href="html/registroP1.html" class="vinculos" target="_self"><h4 id="crearCuenta" class="textoLink">¿No dispone de una cuenta? Creela en este momento >></h4></a>
            </div>
        <?php
    }
}
else {
    /** Si algún campo del formulario no está inicializado... */
    if (isset($_POST['username']) || isset($_POST['contrasena'])) {
        ?>
            <div class="marcoCentral" id="reg">
        <form>
            <h3 class="titulos" id="titulo">Registro</h3>
            <div>

                <div class="columnasDobles" style="float: left;margin-left: 30px;">
                    <input class="formularioEntrada" name="nombre" placeholder="Nombre" type="text" id="nombre" style="margin-top: 0px;">
                    <br><br>
                    <input class="formularioEntrada" name="prApellido" placeholder="Primer apellido" type="text" id="prApellido">
                    <br><br>
                    <input class="formularioEntrada" name="segApellido" placeholder="Segundo apellido(opcional)" type="text" id="sgApellido">
                    <br><br>
                    <input class="formularioEntrada" name="email" placeholder="ejemplo@dominio.es" type="mail" id="mail">
                    <br><br>
                    <label style="font-family:Helvetica;color:rgb(114, 102, 102);"  id="fechaNac">Fecha de nacimiento</label>
                    <input class="formularioEntrada" type="date" id="" name="fechaNac">
                    <br>
                </div>

                <div class="columnasDobles" style="float: right;margin-right: 30px;">
                    <input class="formularioEntrada" name="username" placeholder="Nombre de usuario" type="text" id="user" style="margin-top: 0px;">
                    <br><br>
                    <input  class="formularioEntrada" name="contrasena" placeholder="Contraseña" type="password" id="password">
                    <br><br>
                    <label style="font-family:Helvetica;color:rgb(114, 102, 102);"  id="colorPerfil">Color del perfil:</label>
                    <br><br>
                    <div class="eleccionColores">
                        <form action="" class="eleccionColor" id="eleccionColor">
                            <input type="radio" name="color" id="color1" value="1">
                            <label for="color1"></label>
                            
                            <input type="radio" name="color" id="color2" value="2">
                            <label for="color2"></label>
                            <br>
                            <input type="radio" name="color" id="color3" value="3">
                            <label for="color3"></label>
                        
                            <input type="radio" name="color" id="color4" value="4">
                            <label for="color4"></label>
                            <br>
                            <input type="radio" name="color" id="color5" value="5">
                            <label for="color5"></label>
                        
                            <input type="radio" name="color" id="color6" value="6">
                            <label for="color6"></label>

                            <input type="button" id="previsualizar" value="Previsualizar">
                        </form>
                    </div>
                    
                    
                </div>

            </div>
            <div style="clear: both; text-align: center;">
                <button class="botones" style="float: left; margin-left: 15px;"><a href="../index.html" class="vinculos"><< Atrás</a></button>
                <input type="submit" style="float: right; margin-right: 15px;"  name="Enviar" value="Siguiente >>" class="botones" id="boton"> 
            </div>
        </form>
    </div>
        <?php
    }
    else {
        echo "<h5>Debes validar un usuario para acceder</h5>";
    }
}
?>

    </div>
<script src="../js/registro.js"></script>
<script src="../js/previsualizarColor.js"></script>
</body>
</html>