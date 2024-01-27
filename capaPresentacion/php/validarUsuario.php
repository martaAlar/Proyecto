<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv='cache-control' content='no-cache'> 
    <meta http-equiv='expires' content='0'> 
    <meta http-equiv='pragma' content='no-cache'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
    <link rel="shortcut icon" href="../recursos/iconos/Icono.png">
    <title>Inicio de sesión</title>
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
	if (!empty($_POST['username']) && !empty($_POST['contrasena'])) {
		/** @var Usuario Instancia un objeto de la clase. */
		$usuario = new Usuario();
		/** Inicializa los atributos del objeto. */
		$usuario->setUsername($_POST['username']);
		$usuario->setContrasena($_POST['contrasena']);
		/** Valida el email y la contraseña del usuario. */
		if ($usuario->validaUsuario()) {
			/** Redirige al perfil. */
			header('Location: ../html/perfil.html');
			die();
		}
		else {
			/** No es posible validar el usuario. */
			?>
				<div class="marcoCentral" style="font-size: 18px;" id="login">
                                    <h3 style="font-size: 15px; margin-top: -5%">El email o la contraseña del usuario no son correctos</h3>
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
				<div class="marcoCentral" style="font-size: 18px;" id="login">
                                    <h3 style="font-size: 15px; margin-top: -3.5%;">Todos los campos son obligatorios</h3>
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
		else {
			echo "<h5>Debes validar un usuario para acceder</h5>";
		}
	}
	?>
</body>
</html>