<?php
    $nombre_usuario = $correo = $telefono = '';

    // errores 
    $error_nombre = $error_correo = $error_telefono = False;

    // inicializar mensaje de error y mensaje de confirmación
    $errores = $confirmacion = '';

    if (!empty($_POST['paso']))
    {
        // validar correo:
        if (preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9]/", $_POST['correo']))
        {
            $correo = $_POST['correo'];
        }
        else
        {
            $error_correo = True;
            $errores .= "<h4>Correo electrónico no válido</h4><br/>";
        }

        // validar telefono
        if (preg_match("/[0-9]{9-15}/", $_POST['telefono']))
        {
            $telefono = $POST['telefono'];
        }
        else
        {
            $error_telefono = True;
            $errores .= "<h4>Teléfono no válido</h4><br/>";
        }


        // validar nombre:
        if (preg_match("/[a-zA-Z0-9_]{5-20}/", $_POST['nombre_usuario']))
        {
            $nombre_usuario = $_POST['nombre_usuario'];
        }
        else
        {
            $error_nombre = True;
            $errores .= "<h4>Nombre de usuario no válido</h4> <br/>";

        }

        // mensaje de confirmación
        if (empty($errores))
        {
            $confirmacion = "<h2>Hola $nombre! Correo: $correo</h2>";
        }

        $nombre_usuario = $_POST['nombre_usuario'];
        $correo = $_POST['correo'];
        $telefono =  $_POST['telefono'];
    }
    
   

?>


    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="formulario.php" method="post">

        <input type="hidden" name="paso" value="1" />
        <? echo $errores; ?>
        <div class="campo">

            <label for="nombre_usuario" class="<? echo $error_nombre?>">Nombre de usuario: </label>
            <input type="text" name="nombre_usuario" value="<? echo $nombre_usuario; ?>">

        </div>
        <div class="campo">

            <label for="telefono" class="<? echo $error_telefono?>">Número de teléfono: </label>
            <input type="text" name="telefono" value="<? echo $telefono; ?>">

        </div>
        <div class="campo">

            <label for="correo" class="<? echo $error_correo?>">Correo electrónico: </label>
            <input type="email" name="correo" value="<? echo $correo; ?>">

        </div>
        <div class="campo">
            <input type="submit" value="Enviar">

        </div>
        
    </form>
    <?php echo $confirmacion; ?>
</body>
</html>