<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <?php
            echo 'pruebaCarga antes del include';
            include 'capaNegocio/redes.php';
            echo 'pruebaCarga despues del include';
            $red = new Redes();
            $arrayRedes = $red->redesUsuario();

            if ($arrayRedes) {
                echo '<br>Devuelve bien';
                foreach ($arrayRedes as $valor) {
            ?>
            
            <tr>
                <td>
                    <label for="link">Link:</label>
                    <input type="text" name="link" value="<?php echo $valor->getLinkRed(); ?>" size="30">
                </td>
                <td>
                    <label for="logo">Logo:</label>
                    <input type="text" name="logo" value="<?php echo $valor->getLogoRed(); ?>" size="10">
                </td>
                <td>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" value="<?php echo $valor->getNombreRed(); ?>" size="30">
                </td>
                <td>
                    <input class="boton" type="submit" name="modificar" value="Modificar">
                </td>
                <td>
                    <input class="boton" type="submit" name="eliminar" value="Eliminar">
                </td>
            </tr>
               
            <?php
                }
            }
            ?>
        </tr>
    </table>
</body>
</html>
