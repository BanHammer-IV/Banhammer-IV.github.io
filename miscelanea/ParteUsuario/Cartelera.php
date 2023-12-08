<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../Estilos/estilos_usuario/cartelera_styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera</title>
</head>
<!--CARTELERA-->

<body>

    <div class="div_close">
        <a href="../../index.php">
            <img src="../../images/Icon/close_button.png" class="close_button">
        </a>
    </div>


    <!--CABEZERA DE LA CARTELERA-->
    <div class="header">
        <h2 class="titulo">¡Estrenos!</h2>
    </div>

    <!--PELICULA-->
    <div>
        <form action="DatosPeliculas.php" method="post">
            <button href="DatosPeliculas.php" class="button_peli" style="background-color: transparent; border: none;" >
                <img src="../../images/images_usuario/cartelera/pelicula1.jpeg" class="peliculas" alt="">
                <input type="hidden" value="1" name="id">
            </button>
        </form>
    </div>


    <!--PELICULA-->
    <div>
        <form action="DatosPeliculas.php" method="post">
            <button href="DatosPeliculas.php" class="button_peli" style="background-color: transparent; border: none;" >
                <img src="../../images/images_usuario/cartelera/DSOD.jpg" class="peliculas" alt="">
                <input type="hidden" value="2" name="id">
            </button>
        </form>
    </div>


    <!--PELICULA-->
    <div>
        <form action="DatosPeliculas.php" method="post">
            <button href="DatosPeliculas.php" class="button_peli" style="background-color: transparent; border: none;" >
                <img src="../../images/images_usuario/cartelera/blancanieves.jpg" class="peliculas" alt="">
                <input type="hidden" value="3" name="id">
            </button>
        </form>
    </div>


    <!--PELICULA-->
    <div>
        <form action="DatosPeliculas.php" method="post">
            <button href="DatosPeliculas.php" class="button_peli" style="background-color: transparent; border: none;" >
                <img src="../../images/images_usuario/cartelera/kungfupanda.jpg" class="peliculas" alt="">
                <input type="hidden" value="4" name="id">
            </button>
        </form>
    </div>

</body>

</html>