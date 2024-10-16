<?php

    session_start();


    if (!empty($_GET['paso']))
    {
        $_SESSION['nombre_usuario'] = $_GET['nombre'];

        header("location: /ejercicio4_juanra/bienvenida.php");
        exit();

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
<div class="container-sm">


    <form action="login.php" method="GET">

        <input type="hidden" name="paso" value="1" />
        <div class="mb-3 row">
            <label for="staticName" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
            <input type="text" name="nombre" class="form-control" id="staticName" value="" placeholder="Introduzca el nombre">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <!-- Content here -->

        
    </form>
    <br />
    <a href="configuracion_idioma.php">Configuración de idioma</a><br /><br />
    <a href="logout.php">Salir</a>
</div>
</body>
</html>