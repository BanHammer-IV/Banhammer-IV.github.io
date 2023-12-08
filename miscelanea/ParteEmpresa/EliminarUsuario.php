<?php

error_reporting(0);
include("ConexionEmpleado.php");

$ID = $_REQUEST["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../Estilos/estilos_empresa/login_empleados.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion</title>
</head>

<body>

    <!-- BOTON DE CERRAR -->
    <div class="cerrar">
        <a href="ListarUsuarios.php">
            <img src="../../images/Icon/close_button.png" width="60px" height="60px">
        </a>
    </div>

    <!--FORMULARIO DE REGISTRO-->
    <form action="#" method="post" class="form">
        <!--TITULO DEL FORMULARIO-->
        <h2 class="form_title">Validate</h2>

        <!--DIV DEL USUARIO-->
        <div class="form_group">
            <!--USUARIO-->
            <input class="form_input" type="text" name="usuario" placeholder=" ">
            <label class="form_label" for="Usuario">Usuario:</label><br>
            <span class="form_line"></span>
        </div>

        <br><br>

        <!--DIV DE LA CONTRASEÑA-->
        <div class="form_group">
            <!--CONTRASEÑA-->
            <input class="form_input" type="password" name="password" placeholder=" ">
            <label class="form_label" for="Password">Contraseña:</label><br>
            <span class="form_line"></span>
        </div>

        <br><br>

        <!--BOTON-->
        <input type="submit" class="form_submit" value="Validar">

        </div>
    </form>
</body>

</html>

<?php

$Usuario = $_POST['usuario'];
$Pass = $_POST['password'];

$QueryPuesto = "SELECT * FROM empleados WHERE usuario = '$Usuario' AND pass = '$Pass' ";
$Puesto = mysqli_query($Conexion, $QueryPuesto);
$Mostrar = mysqli_fetch_array($Puesto);

if ($Mostrar['puesto'] == "ADMIN") {
    
    $EliminarUsuario = "DELETE FROM usuarios WHERE id = '$ID' ";
    $QueryDelete = mysqli_query($Conexion, $EliminarUsuario);

    header("Location: ListarUsuarios.php");

}

?>