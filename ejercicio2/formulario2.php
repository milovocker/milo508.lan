<?php

    $error_nombre = False;
    $error_edad = False;
    $error_correo = False;
    $saludo = $errores = "";

    if (!empty($_POST['paso'])){
        // Comprobar datos
        // nombre vacio?
        if (empty($_POST['nombre'])){

            $errores = "<span class=\"errornuevo\">¡ERROR! No se ha enviado ningún nombre.<br></span>";
            $error_nombre = True;

        // edad vacía?
        }if (empty($_POST['edad'])) {

            $errores .= "<span class=\"errornuevo\">¡ERROR! No se ha enviado ninguna edad.<br></span>";
            $error_edad = True;

        // mail vacio?
        }if (empty($_POST['correo'])) {

            $errores .= "<span class=\"errornuevo\">¡ERROR! No se ha enviado ningún correo.<br></span>";
            $error_correo = True;

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
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>" <?php echo $error_nombre; ?>><br/>
        <label for="edad">Edad: </label>
        <input type="number" name="edad" value="<?php echo $edad; ?>" <?php echo $error_edad; ?>><br/>
        <label for="correo">Correo Electrónico </label>
        <input type="email" name="correo" value="<?php echo $correo; ?>" <?php echo $error_correo; ?>><br/>


        <input type="hidden" name="paso" value="1" >
        <input type="submit">
    </form>
    <?php echo $saludo; ?>
</body>
</html>