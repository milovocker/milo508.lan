<?php

    if(!empty($_SESSION['nombre'])){
        echo "Nombre de usuario: " . $_SESSION['nombre'];
    }else{
        echo "Error. Nombre no enviado";
    }
        

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>