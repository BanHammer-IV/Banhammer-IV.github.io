<?php

include("Conexion.php");


$Usuario = $_POST['usuario'];
$Password = $_POST['password'];

$HashPass = md5($Password);

//SELECCIONANDO EL USUARIO QUE INGRESARON
$query = "SELECT * FROM
usuarios WHERE usuario = '$Usuario' AND pass = '$HashPass' ";

//HACIENDO EL QUERY Y GUARDANDOLA EN UNA VARIABLE
$result = $Conexion->query($query);

//IF PARA SABER SI SON VERDADEROS LOS DATOS INGRESADOS EN EL FORMULARIO
if($result->num_rows > 0){
    //CASO VERDADERO: MENSAJE DE BIENVENIDA
    
    session_start();
    $_SESSION['usuario'] = $Usuario;
    header("Location: ../../index.php");
    exit;

}else{
    //CASO FALSO: MENSAJE DE INVALIDACION
?>
    

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="../../Estilos/estilos_usuario/signup_styles.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>unu</title>
    </head>
    <body>

        <div class="form" >

            <div class="cls" style="position: relative; top: -60px; left: 170px">

                <a href="InicioSesion.php">
                    <img src="../../images/Icon/close_button.png" height="30px" width="30px">
                </a>

            </div>

            <h2>Lo sentimos, algo no salio como se esperaba:</h2>

            <br>

            <p>El usuario y/o la contraseña no son validos, por favor intentelo de nuevo</p>


        </div>

    </body>
    </html>


<?php
}

?>