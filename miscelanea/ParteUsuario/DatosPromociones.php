<?php

include("Conexion.php");

$ID = $_POST["id"];

$DatosPromocion = "SELECT * FROM promociones WHERE id = '$ID' ";
$QueryPromocion = mysqli_query($Conexion, $DatosPromocion);

while($Mostrar = mysqli_fetch_array($QueryPromocion)){
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="../../Estilos/estilos_usuario/dulceria_styles.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Promocion</title>
    </head>
    <body>

        <div class="div_close">
            <a href="dulceria.php">
                <img src="../../images\Icon\close_button.png" class="close_button">
            </a>
        </div>
        
        <div class="contenedor_promo">

        <h3>Contenido</h3>
        <p> <?php echo $Mostrar["nombre"] ?> </p>

        <h3>Inicio de venta</h3>
        <p> <?php echo $Mostrar["inicio"] ?> </p>

        <h3>Finalizacion de venta</h3>
        <p> <?php echo $Mostrar["finalizacion"] ?> </p>

        <h3>Precio</h3>
        <p> $<?php echo $Mostrar["precio"]; ?> </p>

        <h3>Descripcion</h3>
        <p> <?php echo $Mostrar["contenido"] ?> </p>

        <img src="<?php echo $Mostrar["imagen"] ?>" class="img_datos">

        </div>

    </body>
    </html>


<?php
}

?>