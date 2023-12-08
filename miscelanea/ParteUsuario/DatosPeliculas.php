<?php

include('Conexion.php');

$ID = $_POST["id"];

$DatosPelicula = "SELECT * FROM peliculas WHERE idPelicula = '$ID' ";
$QueryDatosPelicula = mysqli_query($Conexion, $DatosPelicula);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../Estilos\estilos_usuario\cartelera_styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelicula</title>
</head>
<body>
<?php
    
    while($Mostrar = mysqli_fetch_array($QueryDatosPelicula)){
?>
    <div class="contenedor_datos">

            <img src="" alt="">

            <h2 class="titulo">Nombre</h2>
            <p> <?php echo $Mostrar["nombre"] ?> </p>

            <h2 class="titulo">Descripcion</h2>
            <p> <?php echo $Mostrar["descripcion"] ?> </p>

            <h2 class="titulo">Director</h2>
            <p> <?php echo $Mostrar["director"] ?> </p>

            <h2 class="titulo">Clasificacion</h2>
            <p> <?php echo $Mostrar["clasificacion"] ?> </p>

            <h2 class="titulo">Genero</h2>
            <p> <?php echo $Mostrar["genero"] ?> </p>

            <h2 class="titulo">Salas</h2>
            <p> <?php echo $Mostrar["salas"] ?> </p>

            <h2 class="titulo">Horario</h2>
            <p> <?php echo $Mostrar["horario"] ?> </p>

            <h2 class="titulo">Estreno</h2>
            <p> <?php echo $Mostrar["estreno"] ?> </p>

            <h2 class="titulo">Idiomas</h2>
            <p> <?php echo $Mostrar["idiomas"] ?> </p>

            <h2 class="titulo">Trailes</h2>
            <p> <a href="<?php echo $Mostrar["trailer"] ?>" target="_blank"> <?php echo $Mostrar["trailer"] ?> </a></p>

    </div>
    
    <?php
    }

?>
</body>
</html>
