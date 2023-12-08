<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seccion de dulces</title>
    <link rel="stylesheet" href="../../Estilos/estilos_usuario/dulceria_styles.css">
</head>
<body>

    <div class="div_close" >
        <a href="../../index.php">
            <img src="../../images/Icon/close_button.png" class="close_button">
        </a>
    </div>

    <div class="div_titulo">
        <h2 class="titulo">Seccion de Comida</h2>
    </div><br>
    <!--DIV DE LOS DULCES-->
    <div class="comida">
        <form action="DatosPromociones.php" method="post">
            <button href="DatosPromociones.php" class="button_peli" style="background-color: transparent; border: none;" >
                <img src="https://media.istockphoto.com/id/681903568/es/foto/palomitas-de-ma%C3%ADz-en-caja-con-cola.jpg?s=612x612&w=0&k=20&c=BFq5KXeKl9d29uciTycAu1hZYJg2ZF_3FM1avCq1vsk=" height="269" width="265">
                <input type="hidden" value="1" name="id">
            </button>
        </form>
        
        <!--PRECIO DULCES-->
        <p>Palomitas y refreso</p>
    </div>
    
    <!--DIV DE LOS DULCES-->
    <div class="comida">
        <form action="DatosPromociones.php" method="post">
            <button href="DatosPromociones.php" class="button_peli" style="background-color: transparent; border: none;" >
                <img src="https://www.pngkey.com/png/detail/973-9739103_ws-nachos-kicsi-menu-transparent-coca-cola-png.png" height="269" width="265" alt="">
                <input type="hidden" value="2" name="id">
            </button>
        </form>
        <!--PRECIO DULCES-->
        <p>Nachos y refresco</p>
    </div>

    <!--DIV DE LOS DULCES-->
    <div class="comida">
        <form action="DatosPromociones.php" method="post">
            <button href="DatosPromociones.php" class="button_peli" style="background-color: transparent; border: none;" >
                <img src="https://tofuu.getjusto.com/orioneat-local/resized2/4LAEP6GMxABXPGwmf-1200-1200.webp" height="269" width="265" alt="">
                <input type="hidden" value="3" name="id">
            </button>
        </form>
        <!--PRECIO DULCES-->
        <p>HotDogs, refresco y papas</p>
    </div>
    
</body>
</html>