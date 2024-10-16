<?php

    session_start();
    $errores = ' ';
    if (!empty($_POST['paso'])){

        if(!empty($_POST['selector_idioma'])){
            setcookie("idioma", $_POST['selector_idioma'], time() + 604800); // Crea una cookie
            if (isset($_COOKIE['idioma'])) {
                echo "Idioma: " . $_COOKIE['idioma'];
                header('location: /ejercicio4/bienvenida.php');
                }
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idioma</title>
</head>
<body>
    <form action="idioma.php" method="post">
        <input type="hidden" name="paso" value="1"/>
        <? echo $errores; ?> <br>
        <label for="selector_idioma">Elige tu idioma de preferencia: </label>
        <select name="selector_idioma">
            <option value="espanhol">Español</option>
            <option value="ingles">Inglés</option>
            <option value="frances">Francés</option>
        </select>
        <input type="submit">
    </form>

    
    <br>
    <a href="login.php">Login</a>

</body>
</html>