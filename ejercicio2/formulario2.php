<?php

    $errores = "";
    $saludo = "";

    if (!empty($_POST['paso'])){
        // Comprobar datos
        // nombre vacio?
        if (empty($_POST['nombre'])){
            $errores = "<span class=\"errornuevo\">¡ERROR! No se ha enviado ningún nombre.<br /></span>";
        // edad vacía?
        } elseif (empty($_POST['edad'])) {
            $errores = "<span class=\"errornuevo\">¡ERROR! No se ha enviado ninguna edad.<br /></span>";
        // mail vacio?
        }elseif (empty($_POST['correo'])) {
            $errores = "<span class=\"errornuevo\">¡ERROR! No se ha enviado ningún correo.<br /></span>";
        }else{
            $saludo = "<span class=\"mensaje\">¡Hola, {$_POST['nombre']}! Tienes {$_POST['edad']} años y tu correo electrónico es {$_POST['correo']}<br/></span>";
        }

        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];

    } else {

        $nombre = "";
        $edad = "";
        $correo = "";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        .errornuevo{
            background-color: red;
            color: blue;
        }
        .mensaje{
            background: blue;
            color:white;
        }
        form{
            background: lightgray;
        }
    </style>
</head>
<body>
    <form action="formulario2.php" method="post">
        Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>" <?php echo $errores; ?>>
        Edad: <input type="number" name="edad" value="<?php echo $edad; ?>" <?php echo $errores; ?>>
        Correo Electrónico <input type="email" name="correo" value="<?php echo $correo; ?>" <?php echo $errores; ?>>


        <input type="hidden" name="paso" value="1" />
        <input type="submit">
    </form>
    <?php echo $saludo; ?>
</body>
</html>