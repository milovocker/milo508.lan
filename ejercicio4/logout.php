<?php

    session_start();
    setcookie("idioma", "", time() + 60*60*24*7);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <button type="button">Logout</button>
</body>
</html>