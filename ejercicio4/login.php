<?php

    session_start();
    $errores = ' ';

    if (!empty($_POST['paso'])){

        if (empty($_POST['nombre'])){
            $errores = 'error de nombre';
        }else{
            $_SESSION['nombre'] = $_POST['nombre'];
            header("location: /ejercicio4/bienvenida.php");
            exit();
        }
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
    <input type="hidden" name="paso" value="1"/>
    <? echo $errores; ?> <br>

    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre">

    <input type="submit"> <br>
    <?php 
        echo "Nombre de en la sesión: " . $_SESSION['nombre'];
    ?>
    </form>
</body>
</html>