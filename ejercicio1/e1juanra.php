<?php



    $errores = $hola_nombre= '';
    if(!empty($_POST['paso']))
    {


        if (empty($_POST['nombre']))
            $errores = "<span class=\"error\">¡ERROR! No se ha enviado ningún nombre.<br /></span>";

        else if(strlen($_POST['nombre']) < 5)
            $errores = "<span class=\"error\">¡ERROR! El número de caracteres de nombre, es menor a 5.<br /></span>";

        
        if (empty($errores))
        {
            //$hola_nombre = '<span class="ok">Hola ' . $_POST['nombre'] .'</span>';
            $hola_nombre = "<span class=\"ok\">Hola {$_POST['nombre']}</span>";
        }

        $nombre = $_POST['nombre'];
    }
    else
    {
        $nombre = '';
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de envío</title>
    <style type="text/css">
        .error{
            background:#ff0000;
            color:#fff;
            font-weight:bold;
        }
        .ok{
            background:#00ff00;
            color:#fff;
            font-weight:bold;
        }
    </style>
</head>
<body>
    <form action="e1juanra.php" method="POST">
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre de la persona..."> <?php echo $errores; ?><br>
        
        <input type="hidden" name="paso" value="1" />
        <input type="submit">
    </form>
    <?php echo $hola_nombre; ?>
</body>
</html>