<?php

    session_start();

    setcookie("idioma","",time() + 60*60*24*7);


    unset($_SESSION['nombre_usuario']);


    header("location: /ejercicio4_juanra/login.php");
    exit();