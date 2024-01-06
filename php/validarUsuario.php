

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
					/** Muestra la información del usuario. */
					header('Location: /html/perfil.html');
                    die();
				}
				else {
					/** No es posible validar el usuario. */
					echo "<h5>Error al validar el usuario
							<br>El email o la contraseña del usuario no son
							correctos</h5>";
				}
			}
			else {
				/** Si algún campo del formulario no está inicializado... */
				if (isset($_POST['username']) || isset($_POST['contraseña'])) {
					echo "<h5>Error al validar el usuario
							<br>Todos los campos son obligatorios</h5>";
				}
				else {
					echo "<h5>Debes validar un usuario para acceder</h5>";
				}
			}
    ?>
</body>
</html>