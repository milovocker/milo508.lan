<?php
    session_start();
    if(!empty($_SESSION['nombre'])){

        // saludar segun idioma (cookie)
        if ($_COOKIE['idioma']=='espanhol'){
            echo "Bienvenido " . $_SESSION['nombre'];
        }elseif ($_COOKIE['idioma']=='ingles'){
            echo "Welcome: " . $_SESSION['nombre'];
        } elseif ($_COOKIE['idioma']=='frances'){
            echo "Bienvenue : " . $_SESSION['nombre'];
        }
        
    }else{
        header('location: /ejercicio4/login.php');
    }
        

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <br>
    <a href="idioma.php">Seleccionar idioma</a>
    <br>
    <a href="login.php">Login</a>
</body>
</html>