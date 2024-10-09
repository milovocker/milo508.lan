<?php

    $peliculas = [
        [
            "titulo" => "El Señor de los Anillos: La Comunidad del Anillo",
            "director" => "Peter Jackson",
            "anio" => 2001,
            "genero" => "Fantasía",
            "poster" => "imagenes/lotr1.jpg"
        ],
        [
            "titulo" => "Inception",
            "director" => "Christopher Nolan",
            "anio" => 2010,
            "genero" => "Ciencia Ficción",
            "poster" => "imagenes/inception.jpg"
        ],
        [
            "titulo" => "Seven",
            "director" => "David Fincher",
            "anio" => 1995,
            "genero" => "Crimen",
            "poster" => "imagenes/seven.jpg"
        ],
        [
            "titulo" => "Salvar al soldado Ryan",
            "director" => "Steven Spielberg",
            "anio" => 1998,
            "genero" => "Bélico",
            "poster" => "imagenes/soldadoryan.jpg"
        ],
        [
            "titulo" => "Fight Club",
            "director" => "David Fincher",
            "anio" => 1999,
            "genero" => "Acción",
            "poster" => "imagenes/fightclub.jpg"
        ],
        [
            "titulo" => "Surf's up",
            "director" => "Chris Buck",
            "anio" => 2007,
            "genero" => "Infantil",
            "poster" => "./imagenes/surf.jpg"
        ],
    ]; 

    $generoSeleccionado = isset($_GET['genero_sel']) ? $_GET['genero_sel'] : '';
    

    echo $generoSeleccionado;

    // filtrar por genero
    $peliculasFiltradas = [];

    if ($generoSeleccionado == '') {
        // todas
        $peliculasFiltradas = $peliculas;
        foreach ($peliculas as $pelicula) {
            // acceder a datos de cada pelicula
                echo "<h3>Título: " . $pelicula['titulo'] . "</h3><br>";
                echo "<p>Director: " . $pelicula['director'] . "</p><br>";
                echo "<p>Año: " . $pelicula['anio'] . "</p><br>";
                echo "<p>Género: " . $pelicula['genero'] . "</p><br>";
                echo "<img src=" . $pelicula['poster'] . " >";
                echo "<hr>"; 
            }
    } else {
        foreach ($peliculas as $pelicula) {
            if ($pelicula['genero'] == $generoSeleccionado) {
                $peliculasFiltradas[] = $pelicula;
            }
        }
    }

    foreach($peliculasFiltradas as $peliGenero) {
        echo "<h3>Título: " . $peliGenero['titulo'] . "</h3><br>";
        echo "<p>Director: " . $peliGenero['director'] . "</p><br>";
        echo "<p>Año: " . $peliGenero['anio'] . "</p><br>";
        echo "<p>Género: " . $peliGenero['genero'] . "</p><br>";
        echo "<img src=" . $peliGenero['poster'] . " >";
        echo "<hr>"; 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="get" action="catalogo.php">
    <label for="genero_sel">Filtrar por género:</label>
    <select name="genero_sel" id="genero_sel">

        <option value="">Todos</option>
        <option value="Fantasía">Fantasía</option>
        <option value="Ciencia Ficción">Ciencia Ficción</option>
        <option value="Crimen">Crimen</option>
        <option value="Bélico">Bélico</option>
        <option value="Acción">Acción</option>
        <option value="Infantil">Infantil</option>


        <?php foreach ($generos as $genero): ?>
            <option value="<?php echo $genero; ?>" <?php if ($genero == $generoSeleccionado) echo 'selected'; ?>>
                <?php echo "<span id='genero_elegido'>".$genero."</span>"; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Filtrar">
</form>
</body>
</html>