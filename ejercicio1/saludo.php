<?php

$nombre = $_POST["nombre"];


if (empty($_POST["nombre"])){
    echo "¡ERROR! No se ha enviado nada";
}else if (strlen($nombre)>=5){
    echo "¡Hola, {$nombre}!";

} else{
    echo "Nombre demasiado corto...";
}

?>