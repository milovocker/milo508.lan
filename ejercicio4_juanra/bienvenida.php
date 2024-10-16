<?php

    session_start();

    $idioma = $_COOKIE['idioma'];

    /*
    if ($idioma == 'ES')
        $texto_idioma = 'Español';
    else if ($idioma == 'DE')
        $texto_idioma = 'Alemán';
    else if ($idioma == 'FR')
        $texto_idioma = 'Francés';
    else
        $texto_idioma = 'Inglés';
    */
    switch($idioma)
    {
        case 'ES':
            $texto_idioma = 'Español';
        break;
        case 'DE':
            $texto_idioma = 'Alemán';
        break;
        case 'FR':
            $texto_idioma = 'Francés';
        break;
        default:
            $texto_idioma = 'Inglés';
        break;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <title>Página de bienvenida</title>
</head>
<body>
    <div class="container">


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="login.php"><?php echo $_SESSION['nombre_usuario']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo "Idioma: " . $texto_idioma; ?></li>
            </ol>
        </nav>



    </div>



    
</body>
</html>